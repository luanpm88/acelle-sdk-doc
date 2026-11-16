<?php

namespace App\Seo;

/**
 * The JSON-LD of each page (schema.org). Every page carries the site (WebSite), its
 * publisher (the AcelleMail organization of acellesend.com, config/brand.php), the
 * page itself and, below the overview, its breadcrumb.
 *
 *   overview  → WebPage
 *   guide     → TechArticle
 *   section   → CollectionPage listing its endpoints
 *   endpoint  → APIReference
 */
final class StructuredData
{
    public static function overview(string $title, string $description): array
    {
        $url = SiteUrl::route('home');

        return self::graph([
            '@type' => 'WebPage',
            '@id' => $url.'#webpage',
            'url' => $url,
            'name' => $title,
            'description' => $description,
            'inLanguage' => 'en',
            'isPartOf' => ['@id' => self::websiteId()],
            'publisher' => ['@id' => self::organizationId()],
        ]);
    }

    public static function guide(array $guide, string $description): array
    {
        $url = SiteUrl::route('guide', $guide['slug']);

        return self::graph(
            [
                '@type' => 'TechArticle',
                '@id' => $url.'#article',
                'url' => $url,
                'headline' => $guide['title'],
                'description' => $description,
                'inLanguage' => 'en',
                'isPartOf' => ['@id' => self::websiteId()],
                'publisher' => ['@id' => self::organizationId()],
                'breadcrumb' => ['@id' => $url.'#breadcrumb'],
            ],
            self::breadcrumb($url, [[$guide['title'], $url]])
        );
    }

    public static function section(array $section, string $description): array
    {
        $url = SiteUrl::route('section', $section['slug']);
        $items = [];
        foreach ($section['operations'] as $i => $operation) {
            $items[] = [
                '@type' => 'ListItem',
                'position' => $i + 1,
                'name' => $operation['summary'],
                'url' => SiteUrl::route('operation', [$section['slug'], $operation['slug']]),
            ];
        }

        return self::graph(
            [
                '@type' => 'CollectionPage',
                '@id' => $url.'#webpage',
                'url' => $url,
                'name' => $section['name'],
                'description' => $description,
                'inLanguage' => 'en',
                'isPartOf' => ['@id' => self::websiteId()],
                'publisher' => ['@id' => self::organizationId()],
                'breadcrumb' => ['@id' => $url.'#breadcrumb'],
                'mainEntity' => ['@type' => 'ItemList', 'itemListElement' => $items],
            ],
            self::breadcrumb($url, [[$section['name'], $url]])
        );
    }

    public static function operation(array $section, array $operation, string $description): array
    {
        $url = SiteUrl::route('operation', [$section['slug'], $operation['slug']]);

        return self::graph(
            [
                '@type' => 'APIReference',
                '@id' => $url.'#article',
                'url' => $url,
                'headline' => $operation['summary'],
                'name' => $operation['method'].' '.$operation['path'],
                'description' => $description,
                'articleSection' => $section['name'],
                'inLanguage' => 'en',
                'isPartOf' => ['@id' => self::websiteId()],
                'publisher' => ['@id' => self::organizationId()],
                'breadcrumb' => ['@id' => $url.'#breadcrumb'],
            ],
            self::breadcrumb($url, [
                [$section['name'], SiteUrl::route('section', $section['slug'])],
                [$operation['summary'], $url],
            ])
        );
    }

    private static function graph(array ...$nodes): array
    {
        return [
            '@context' => 'https://schema.org',
            '@graph' => array_merge([self::website(), self::organization()], $nodes),
        ];
    }

    private static function website(): array
    {
        return [
            '@type' => 'WebSite',
            '@id' => self::websiteId(),
            'url' => SiteUrl::route('home'),
            'name' => config('brand.site_name'),
            'description' => 'Reference of the '.config('brand.name').' REST API, with a request sample for every endpoint.',
            'inLanguage' => 'en',
            'publisher' => ['@id' => self::organizationId()],
        ];
    }

    private static function organization(): array
    {
        return [
            '@type' => 'Organization',
            '@id' => self::organizationId(),
            'name' => config('brand.name'),
            'alternateName' => config('brand.alternate_names'),
            'url' => config('brand.url'),
            'logo' => config('brand.logo'),
            'description' => config('brand.description'),
        ];
    }

    /** @param list<array{0: string, 1: string}> $trail name and address after the overview */
    private static function breadcrumb(string $url, array $trail): array
    {
        $items = [['@type' => 'ListItem', 'position' => 1, 'name' => config('brand.site_name'), 'item' => SiteUrl::route('home')]];
        foreach ($trail as $i => $crumb) {
            $items[] = ['@type' => 'ListItem', 'position' => $i + 2, 'name' => $crumb[0], 'item' => $crumb[1]];
        }

        return ['@type' => 'BreadcrumbList', '@id' => $url.'#breadcrumb', 'itemListElement' => $items];
    }

    private static function websiteId(): string
    {
        return SiteUrl::route('home').'#website';
    }

    private static function organizationId(): string
    {
        return config('brand.url').'/#organization';
    }
}
