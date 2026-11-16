<?php

namespace Tests\Feature;

use App\ApiReference\InvalidReference;
use App\ApiReference\Reference;
use App\Seo\SiteUrl;
use Tests\TestCase;

/**
 * The site's pages are the reference file (resources/api-reference.json, exported by
 * the application): one page per guide, per section and per endpoint, each found in
 * the sitemap. Until 2026-11-16 the site was one page of 55 hand-written sections that
 * still documented /file/upload and routes the application no longer had.
 */
class ApiReferencePagesTest extends TestCase
{
    public function testEveryPageOfTheReferenceAnswers()
    {
        $reference = Reference::load();

        foreach ($reference->guides() as $guide) {
            $this->get(route('guide', $guide['slug']))->assertOk()->assertSee($guide['title']);
        }
        foreach ($reference->sections() as $section) {
            $this->get(route('section', $section['slug']))->assertOk()->assertSee($section['name']);
            foreach ($section['operations'] as $operation) {
                $this->get(route('operation', [$section['slug'], $operation['slug']]))
                    ->assertOk()
                    ->assertSee('<h1 class="h4 mb-3">'.e($operation['summary']).'</h1>', false)
                    ->assertSee(e($operation['path']), false);
            }
        }
    }

    public function testTheOverviewLinksEveryEndpoint()
    {
        $html = $this->get('/')->assertOk()->getContent();

        foreach (Reference::load()->sections() as $section) {
            foreach ($section['operations'] as $operation) {
                $this->assertStringContainsString('href="'.route('operation', [$section['slug'], $operation['slug']]).'"', $html);
            }
        }
    }

    public function testAnEndpointPageCarriesItsSamplesAndItsAddress()
    {
        $html = $this->get('/lists/create-list')->assertOk()->getContent();
        $canonical = rtrim(config('app.url'), '/').'/lists/create-list';

        $this->assertStringContainsString('<link rel="canonical" href="'.$canonical.'">', $html);
        $this->assertStringContainsString('<title>Create a list | AcelleMail API</title>', $html);
        $this->assertStringContainsString('<meta name="description" content="POST /api/v1/lists — Create a list.', $html);
        // The generated curl, and the SDK call with the language switch.
        $this->assertStringContainsString(e("curl -X POST 'https://your-domain/api/v1/lists'"), $html);
        $this->assertStringContainsString(e('$client->list()->create(['), $html);
        $this->assertStringContainsString('<select class="lang-switch curl">', $html);
    }

    public function testAnEndpointWithoutAnSdkCallShowsCurlAlone()
    {
        $html = $this->get('/subscribers/start-subscriber-import')->assertOk()->getContent();

        $this->assertStringNotContainsString('<select class="lang-switch', $html);
        $this->assertSame(2, substr_count($html, 'class="code-box dark-theme single-lang'));
    }

    public function testUnknownPagesAreNotFound()
    {
        $this->get('/nope')->assertNotFound();
        $this->get('/lists/nope')->assertNotFound();
        $this->get('/nope/create-list')->assertNotFound();
        $this->get('/guides/nope')->assertNotFound();
    }

    public function testTheSitemapListsEveryPageAtTheSiteAddress()
    {
        $reference = Reference::load();
        $count = 1 + count($reference->guides());
        foreach ($reference->sections() as $section) {
            $count += 1 + count($section['operations']);
        }
        $base = rtrim(config('app.url'), '/');

        $xml = $this->get('/sitemap.xml')->assertOk()->assertHeader('Content-Type', 'application/xml; charset=UTF-8')->getContent();

        $this->assertSame($count, substr_count($xml, '<loc>'));
        $this->assertStringContainsString("<loc>{$base}/lists/create-list</loc>", $xml);
        $this->assertSame($count, substr_count($xml, "<loc>{$base}/"));
        $this->get('/robots.txt')->assertOk()->assertSee("Sitemap: {$base}/sitemap.xml");
    }

    public function testTheSearchFindsEndpoints()
    {
        $this->getJson('/docs/api/lookup?keyword=IMPORT')
            ->assertOk()
            ->assertJsonFragment(['title' => 'Import contacts, in the background', 'link' => route('operation', ['subscribers', 'start-subscriber-import'])]);
    }

    /** The brand is AcelleMail of acellesend.com: no page links the former marketplace or domain. */
    public function testNoPageLinksTheFormerMarketplaceOrDomain()
    {
        foreach (['/', '/guides/authentication', '/lists', '/lists/create-list', '/llms.txt', '/robots.txt', '/sitemap.xml'] as $page) {
            $content = $this->get($page)->assertOk()->getContent();
            $this->assertDoesNotMatchRegularExpression('/codecanyon|envato|acellemail\.com/i', $content, $page);
        }
        $html = $this->get('/')->assertOk()->getContent();
        $this->assertStringContainsString('href="'.config('brand.links.pricing').'"', $html);
        $this->assertStringContainsString('src="'.asset('images/logo_dark.svg').'"', $html);
    }

    /** @dataProvider structuredDataPages */
    public function testEveryPageCarriesItsStructuredData(string $page, string $type, bool $breadcrumb)
    {
        $html = $this->get($page)->assertOk()->getContent();
        $this->assertSame(1, preg_match('#<script type="application/ld\+json">(.*?)</script>#s', $html, $m));
        $graph = collect(json_decode($m[1], true, 512, JSON_THROW_ON_ERROR)['@graph'])->keyBy('@type');

        $this->assertSame(SiteUrl::route('home'), $graph['WebSite']['url']);
        $this->assertSame('AcelleMail', $graph['Organization']['name']);
        $this->assertSame('https://acellesend.com', $graph['Organization']['url']);
        $this->assertSame(SiteUrl::to($page), $graph[$type]['url']);
        $this->assertSame($breadcrumb, $graph->has('BreadcrumbList'));
    }

    public function structuredDataPages(): array
    {
        return [
            'overview' => ['/', 'WebPage', false],
            'guide' => ['/guides/authentication', 'TechArticle', true],
            'section' => ['/lists', 'CollectionPage', true],
            'endpoint' => ['/lists/create-list', 'APIReference', true],
        ];
    }

    public function testLlmsTxtListsEveryPageForAiAssistants()
    {
        $text = $this->get('/llms.txt')->assertOk()->assertHeader('Content-Type', 'text/plain; charset=UTF-8')->getContent();

        $this->assertStringStartsWith("# AcelleMail API\n\n> ", $text);
        $reference = Reference::load();
        foreach ($reference->guides() as $guide) {
            $this->assertStringContainsString('['.$guide['title'].']('.SiteUrl::route('guide', $guide['slug']).')', $text);
        }
        foreach ($reference->sections() as $section) {
            foreach ($section['operations'] as $operation) {
                $this->assertStringContainsString(
                    '['.$operation['summary'].']('.SiteUrl::route('operation', [$section['slug'], $operation['slug']]).'): `'.$operation['method'].' '.$operation['path'].'`',
                    $text
                );
            }
        }
        $this->assertStringNotContainsString('..', str_replace('...', '', $text));
    }

    public function testLlmsFullTxtHoldsTheWholeReference()
    {
        $text = $this->get('/llms-full.txt')->assertOk()->assertHeader('Content-Type', 'text/plain; charset=UTF-8')->getContent();

        $this->assertStringStartsWith("# AcelleMail API — full reference\n\n> ", $text);
        $reference = Reference::load();
        foreach ($reference->guides() as $guide) {
            $this->assertStringContainsString("## Guide: {$guide['title']}\n\nPage: ".SiteUrl::route('guide', $guide['slug'])."\n\n".rtrim($guide['markdown']), $text);
        }
        foreach ($reference->sections() as $section) {
            foreach ($section['operations'] as $operation) {
                $this->assertStringContainsString(
                    "### {$operation['summary']}\n\n`{$operation['method']} {$operation['path']}`",
                    $text
                );
                $this->assertStringContainsString('Page: '.SiteUrl::route('operation', [$section['slug'], $operation['slug']]), $text);
                $this->assertStringContainsString(rtrim($operation['samples'][0]['code']), $text);
            }
        }
        // Markdown, not HTML: no entity, every fence closed, no run of blank lines.
        $this->assertStringNotContainsString('&quot;', $text);
        $this->assertSame(0, preg_match_all('/^```\w+$/m', $text) - preg_match_all('/^```$/m', $text));
        $this->assertStringNotContainsString("\n\n\n", $text);
        $this->assertStringContainsString(SiteUrl::route('llms-full'), $this->get('/llms.txt')->getContent());
    }

    public function testRobotsLetsTheAiCrawlersSearchAnswerAndTrain()
    {
        $text = $this->get('/robots.txt')->assertOk()->getContent();

        foreach (['GPTBot', 'ClaudeBot', 'PerplexityBot', 'Google-Extended', '*'] as $bot) {
            $this->assertStringContainsString("User-agent: {$bot}\n", $text);
        }
        $this->assertStringContainsString('Content-Signal: search=yes, ai-input=yes, ai-train=yes', $text);
        $this->assertStringContainsString('Sitemap: '.SiteUrl::route('sitemap'), $text);
    }

    public function testAnAddressWithoutSchemeIsRefused()
    {
        config(['app.url' => 'api.acellesend.com']);

        $this->expectException(\LogicException::class);
        SiteUrl::to('/');
    }

    /** @dataProvider brokenFiles */
    public function testTheReferenceFileIsRefusedWhenItLacksWhatThePagesRead(callable $break, string $message)
    {
        $data = json_decode(file_get_contents(resource_path('api-reference.json')), true);
        $break($data);
        $file = tempnam(sys_get_temp_dir(), 'api-reference-');
        file_put_contents($file, json_encode($data));

        try {
            Reference::load($file);
            $this->fail('The file was read');
        } catch (InvalidReference $e) {
            $this->assertStringContainsString($message, $e->getMessage());
        } finally {
            unlink($file);
        }
    }

    public function brokenFiles(): array
    {
        return [
            'a missing summary' => [function (array &$d) {
                unset($d['sections'][0]['operations'][0]['summary']);
            }, '/sections/0/operations/0/summary: is missing'],
            'a flag of another type' => [function (array &$d) {
                $d['sections'][0]['operations'][0]['public'] = 'yes';
            }, '/sections/0/operations/0/public: must be bool'],
            'an SDK call in another language' => [function (array &$d) {
                $d['sections'][2]['operations'][1]['codeSamples'][0]['lang'] = 'Python';
            }, "/sections/2/operations/1/codeSamples/0/lang: 'Python'"],
            'a section named like a page of the site' => [function (array &$d) {
                $d['sections'][0]['slug'] = 'guides';
            }, "/sections/0/slug: 'guides' is a page of this site"],
            'a description without its Markdown' => [function (array &$d) {
                unset($d['sections'][0]['operations'][0]['descriptionMarkdown']);
            }, '/sections/0/operations/0/descriptionMarkdown: is missing'],
            'two endpoints at one address' => [function (array &$d) {
                $d['sections'][0]['operations'][1]['slug'] = $d['sections'][0]['operations'][0]['slug'];
            }, '/sections/0/operations/1/slug'],
        ];
    }
}
