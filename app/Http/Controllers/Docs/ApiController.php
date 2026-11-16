<?php

namespace App\Http\Controllers\Docs;

use App\ApiReference\Reference;
use App\Http\Controllers\Controller;
use App\Seo\LlmsTxt;
use App\Seo\SiteUrl;
use App\Seo\StructuredData;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Every page of the site, read from the reference file (App\ApiReference\Reference).
 * One page per endpoint, so each can be found and linked on its own. What search
 * engines and AI assistants read — titles, descriptions, canonical links, JSON-LD,
 * sitemap, robots.txt, llms.txt — is built here and in App\Seo from the same file.
 */
class ApiController extends Controller
{
    /** Overview: introduction, guides, every endpoint by section. */
    public function index(Request $request, Reference $reference)
    {
        $title = config('brand.name').' REST API reference';
        $description = 'Reference of the '.config('brand.name').' REST API: lists, subscribers, campaigns, automations, customers and plans, with a curl and PHP sample for every endpoint.';

        return $this->page($request, 'docs.api.index', $reference, [
            'current' => 'home',
            'currentSection' => null,
            'pageTitle' => $title,
            'pageDescription' => $description,
            'canonical' => SiteUrl::route('home'),
            'jsonLd' => StructuredData::overview($title, $description),
        ]);
    }

    public function guide(Request $request, Reference $reference, string $guide)
    {
        $page = $reference->guide($guide);
        if ($page === null) {
            abort(404);
        }
        $description = $this->excerpt($page['html']);

        return $this->page($request, 'docs.api.guide', $reference, [
            'guide' => $page,
            'current' => 'guide/'.$page['slug'],
            'currentSection' => null,
            'pageTitle' => $page['title'].' | '.config('brand.site_name'),
            'pageDescription' => $description,
            'canonical' => SiteUrl::route('guide', $page['slug']),
            'jsonLd' => StructuredData::guide($page, $description),
        ]);
    }

    public function section(Request $request, Reference $reference, string $section)
    {
        $page = $reference->section($section);
        if ($page === null) {
            abort(404);
        }
        $description = $page['description'] ?? $page['name'].' endpoints of the '.config('brand.name').' REST API.';

        return $this->page($request, 'docs.api.section', $reference, [
            'section' => $page,
            'current' => $page['slug'],
            'currentSection' => $page['slug'],
            'pageTitle' => $page['name'].' | '.config('brand.site_name'),
            'pageDescription' => $description,
            'canonical' => SiteUrl::route('section', $page['slug']),
            'jsonLd' => StructuredData::section($page, $description),
        ]);
    }

    public function operation(Request $request, Reference $reference, string $section, string $operation)
    {
        $sectionPage = $reference->section($section);
        $page = $sectionPage === null ? null : $reference->operation($sectionPage, $operation);
        if ($page === null) {
            abort(404);
        }

        $description = $page['method'].' '.$page['path'].' — '.$page['summary'].'.';
        if ($page['description'] !== null) {
            $description .= ' '.$this->excerpt($page['description']);
        }
        $description = Str::limit($description, 160);

        return $this->page($request, 'docs.api.operation', $reference, [
            'section' => $sectionPage,
            'operation' => $page,
            'current' => $sectionPage['slug'].'/'.$page['slug'],
            'currentSection' => $sectionPage['slug'],
            'pageTitle' => $page['summary'].' | '.config('brand.site_name'),
            'pageDescription' => $description,
            'canonical' => SiteUrl::route('operation', [$sectionPage['slug'], $page['slug']]),
            'jsonLd' => StructuredData::operation($sectionPage, $page, $description),
        ]);
    }

    public function sitemap(Reference $reference)
    {
        $urls = [SiteUrl::route('home')];
        foreach ($reference->guides() as $guide) {
            $urls[] = SiteUrl::route('guide', $guide['slug']);
        }
        foreach ($reference->sections() as $section) {
            $urls[] = SiteUrl::route('section', $section['slug']);
            foreach ($section['operations'] as $operation) {
                $urls[] = SiteUrl::route('operation', [$section['slug'], $operation['slug']]);
            }
        }

        return response()
            ->view('docs.api.sitemap', ['urls' => $urls])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    /**
     * The AI crawlers are named one by one in the same group as `*` (RFC 9309 §2.1).
     * Content-Signal says yes to all three uses — search, live answers and model
     * training (product owner, 2026-11-16): nothing here is secret, and models that
     * learned the API write working integrations. acellesend.com itself says ai-train=no.
     */
    public function robots()
    {
        $bots = ['GPTBot', 'ChatGPT-User', 'OAI-SearchBot', 'ClaudeBot', 'Claude-User', 'Claude-SearchBot', 'anthropic-ai',
            'PerplexityBot', 'Perplexity-User', 'Google-Extended', 'GoogleOther', 'Applebot-Extended', 'Amazonbot',
            'Meta-ExternalAgent', 'Bytespider', 'CCBot', 'cohere-ai', 'DuckAssistBot', 'MistralAI-User', 'omgili', '*'];

        $lines = array_map(function ($bot) {
            return 'User-agent: '.$bot;
        }, $bots);
        array_push(
            $lines,
            'Content-Signal: search=yes, ai-input=yes, ai-train=yes',
            'Allow: /',
            'Disallow: /docs/api/',
            '',
            'Sitemap: '.SiteUrl::route('sitemap')
        );

        return response(implode("\n", $lines)."\n")->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    public function llms(Reference $reference)
    {
        return response(LlmsTxt::build($reference))->header('Content-Type', 'text/plain; charset=UTF-8');
    }

    /** The "Find anything" box: guides, sections and endpoints matching the keyword. */
    public function lookup(Request $request, Reference $reference)
    {
        $keyword = trim((string) $request->keyword);
        $matches = function (string ...$texts) use ($keyword) {
            if ($keyword === '') {
                return true;
            }
            foreach ($texts as $text) {
                if (stripos($text, $keyword) !== false) {
                    return true;
                }
            }

            return false;
        };

        $result = [];
        foreach ($reference->guides() as $guide) {
            if ($matches($guide['title'])) {
                $result[] = ['title' => $guide['title'], 'cat' => 'Guide', 'link' => route('guide', $guide['slug']), 'desc' => $this->excerpt($guide['html'])];
            }
        }
        foreach ($reference->sections() as $section) {
            if ($matches($section['name'], (string) $section['description'])) {
                $result[] = ['title' => $section['name'], 'cat' => 'Section', 'link' => route('section', $section['slug']), 'desc' => (string) $section['description']];
            }
            foreach ($section['operations'] as $operation) {
                if ($matches($operation['summary'], $operation['path'], $operation['method'].' '.$operation['path'])) {
                    $result[] = [
                        'title' => $operation['summary'],
                        'cat' => $section['name'],
                        'link' => route('operation', [$section['slug'], $operation['slug']]),
                        'desc' => $operation['method'].' '.$operation['path'],
                    ];
                }
            }
        }

        return response()->json($result);
    }

    /** Save theme option. */
    public function saveTheme(Request $request)
    {
        $request->validate(['theme' => 'required|in:dark-theme,default-theme']);
        $request->session()->put('theme', $request->theme);
    }

    /** Save the language of the code samples. */
    public function saveLang(Request $request)
    {
        $request->validate(['lang' => 'required|in:curl,php']);
        $request->session()->put('lang', $request->lang);
    }

    private function page(Request $request, string $view, Reference $reference, array $data)
    {
        if (!$request->session()->exists('theme')) {
            $request->session()->put('theme', 'dark-theme');
        }

        return view($view, ['reference' => $reference] + $data);
    }

    private function excerpt(string $html): string
    {
        return Str::limit(trim(preg_replace('/\s+/', ' ', html_entity_decode(strip_tags($html), ENT_QUOTES))), 155);
    }
}
