<?php

namespace App\Seo;

use App\ApiReference\Reference;

/**
 * /llms.txt (https://llmstxt.org): what this site is, then every page with one line
 * on what it holds, for AI assistants that read the site. Built from the reference
 * file like the pages, so it lists exactly the endpoints the site shows.
 */
final class LlmsTxt
{
    public static function build(Reference $reference): string
    {
        $brand = config('brand.name');
        $lines = [
            '# '.config('brand.site_name'),
            '',
            self::summary($reference),
            '',
            'The whole reference in one file, every guide and endpoint in full: '.SiteUrl::route('llms-full'),
            '',
            '## Guides',
            '',
        ];
        foreach ($reference->guides() as $guide) {
            $lines[] = '- ['.$guide['title'].']('.SiteUrl::route('guide', $guide['slug']).'): '.self::firstSentence($guide['html']);
        }

        foreach (['customer' => 'Customer API', 'admin' => 'Admin API'] as $audience => $group) {
            foreach ($reference->sections($audience) as $section) {
                $lines[] = '';
                $lines[] = '## '.$group.': '.$section['name'];
                $lines[] = '';
                if ($section['description'] !== null) {
                    $lines[] = $section['description'];
                    $lines[] = '';
                }
                foreach ($section['operations'] as $operation) {
                    $lines[] = '- ['.$operation['summary'].']('.SiteUrl::route('operation', [$section['slug'], $operation['slug']]).'): `'
                        .$operation['method'].' '.$operation['path'].'`'.($operation['public'] ? ', no API token needed' : '');
                }
            }
        }

        $links = config('brand.links');
        array_push(
            $lines,
            '',
            '## Optional',
            '',
            '- ['.$brand.']('.config('brand.url').'): '.config('brand.description'),
            '- [Pricing]('.$links['pricing'].'): licenses and what they include',
            '- [Live demo]('.$links['demo'].'): try '.$brand.' before installing it',
            '- [Installation guides]('.$links['installation'].'): install '.$brand.' on a VPS or a control-panel host',
            '- [Developer guide]('.$links['developer_guide'].'): plugins, webhooks and integrations',
            '- [PHP SDK]('.$links['sdk'].'): `composer require acelle/sdk-php`',
            '- [Contact]('.$links['contact'].'): support and sales'
        );

        return implode("\n", $lines)."\n";
    }

    /** What the site is: the opening of llms.txt and llms-full.txt. */
    public static function summary(Reference $reference): string
    {
        $brand = config('brand.name');

        return '> Reference of the REST API of '.$brand.', the self-hosted email marketing application from '.config('brand.url').'. '
            .'Every '.$brand.' installation serves the API on its own domain at https://your-domain/api/v1; '
            .'calls carry a user\'s API token in `Authorization: Bearer YOUR_API_TOKEN` and send `Accept: application/json`.'
            ."\n\n"
            .'Each endpoint page gives the method and path, its parameters and request body, a curl request, '
            .'the PHP SDK call (`acelle/sdk-php`) where the SDK has one, and example answers. '
            .'Customer API endpoints work with a customer\'s token; Admin API endpoints need an admin\'s token. '
            .'This reference was generated from '.$brand.' '.$reference->appVersion().'.';
    }

    private static function firstSentence(string $html): string
    {
        $text = trim(preg_replace('/\s+/', ' ', html_entity_decode(strip_tags($html), ENT_QUOTES)));
        if (preg_match('/\A(.+?[.:])(\s|\z)/u', $text, $m)) {
            return rtrim($m[1], ':.').'.';
        }

        return $text;
    }
}
