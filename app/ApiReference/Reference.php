<?php

namespace App\ApiReference;

/**
 * The API reference this site shows: resources/api-reference.json, written by the
 * application's `php artisan api-docs:export` and copied here by
 * scripts/sync-api-reference.sh. The application's store (resources/api/) is the
 * only place the reference is written; nothing here is edited by hand.
 *
 * The file is checked whole when it is read. A key this site reads that is missing,
 * or of another type, stops the request with the place it was expected, never a page
 * with a blank where the value belongs. Keys this site does not read are left alone.
 *
 * Pages: / (overview), /guides/{guide}, /{section}, /{section}/{operation}.
 */
final class Reference
{
    const AUDIENCES = ['customer', 'admin'];

    /** Path segments a section cannot take: routes of their own. */
    const RESERVED_SLUGS = ['guides', 'docs', 'sitemap.xml', 'robots.txt'];

    /** @var array */
    private $data;

    private function __construct(array $data)
    {
        $this->data = $data;
    }

    public static function load(?string $file = null): self
    {
        $file = $file ?? resource_path('api-reference.json');
        if (!is_file($file)) {
            throw new InvalidReference("API reference file not found: {$file}");
        }
        $json = file_get_contents($file);
        if ($json === false) {
            throw new InvalidReference("API reference file cannot be read: {$file}");
        }
        $data = json_decode($json, true, 512, JSON_THROW_ON_ERROR);
        if (!is_array($data)) {
            throw InvalidReference::at('/', 'must be an object');
        }
        self::checkDocument($data);

        return new self($data);
    }

    public function appVersion(): string
    {
        return $this->data['app_version'];
    }

    /** `https://your-domain/api/v1`: the samples keep the placeholder address. */
    public function baseUrl(): string
    {
        return $this->data['base_url'];
    }

    /** @return list<array> slug, title, html */
    public function guides(): array
    {
        return $this->data['guides'];
    }

    /** null: no guide has this slug (the page answers 404). */
    public function guide(string $slug): ?array
    {
        foreach ($this->data['guides'] as $guide) {
            if ($guide['slug'] === $slug) {
                return $guide;
            }
        }

        return null;
    }

    /** @return list<array> audience, slug, name, description, operations */
    public function sections(?string $audience = null): array
    {
        if ($audience !== null && !in_array($audience, self::AUDIENCES, true)) {
            throw new \InvalidArgumentException("Unknown audience '{$audience}'");
        }
        if ($audience === null) {
            return $this->data['sections'];
        }

        return array_values(array_filter($this->data['sections'], function (array $section) use ($audience) {
            return $section['audience'] === $audience;
        }));
    }

    /** null: no section has this slug (the page answers 404). */
    public function section(string $slug): ?array
    {
        foreach ($this->data['sections'] as $section) {
            if ($section['slug'] === $slug) {
                return $section;
            }
        }

        return null;
    }

    /** null: the section has no operation with this slug (the page answers 404). */
    public function operation(array $section, string $slug): ?array
    {
        foreach ($section['operations'] as $operation) {
            if ($operation['slug'] === $slug) {
                return $operation;
            }
        }

        return null;
    }

    // ── The check ────────────────────────────────────────────────────────────

    private static function checkDocument(array $data): void
    {
        self::expect($data, 'app_version', 'string', '');
        self::expect($data, 'base_url', 'string', '');

        $guideSlugs = [];
        foreach (self::expect($data, 'guides', 'list', '') as $i => $guide) {
            $at = "/guides/{$i}";
            self::expectObject($guide, $at);
            $slug = self::expect($guide, 'slug', 'slug', $at);
            self::expect($guide, 'title', 'string', $at);
            self::expect($guide, 'html', 'string', $at);
            self::unique($guideSlugs, $slug, "{$at}/slug");
        }

        $sectionSlugs = [];
        foreach (self::expect($data, 'sections', 'list', '') as $i => $section) {
            $at = "/sections/{$i}";
            self::expectObject($section, $at);
            $audience = self::expect($section, 'audience', 'string', $at);
            if (!in_array($audience, self::AUDIENCES, true)) {
                throw InvalidReference::at("{$at}/audience", 'must be '.implode(' or ', self::AUDIENCES));
            }
            $slug = self::expect($section, 'slug', 'slug', $at);
            if (in_array($slug, self::RESERVED_SLUGS, true)) {
                throw InvalidReference::at("{$at}/slug", "'{$slug}' is a page of this site");
            }
            self::unique($sectionSlugs, $slug, "{$at}/slug");
            self::expect($section, 'name', 'string', $at);
            self::expect($section, 'description', '?string', $at);

            $operationSlugs = [];
            foreach (self::expect($section, 'operations', 'list', $at) as $j => $operation) {
                self::checkOperation($operation, "{$at}/operations/{$j}", $operationSlugs);
            }
        }
    }

    private static function checkOperation($operation, string $at, array &$slugs): void
    {
        self::expectObject($operation, $at);
        self::unique($slugs, self::expect($operation, 'slug', 'slug', $at), "{$at}/slug");
        foreach (['method', 'path', 'summary'] as $key) {
            self::expect($operation, $key, 'string', $at);
        }
        self::expect($operation, 'description', '?string', $at);
        self::expect($operation, 'public', 'bool', $at);

        foreach (self::expect($operation, 'parameters', 'list', $at) as $i => $field) {
            self::checkField($field, "{$at}/parameters/{$i}");
        }
        foreach (self::expect($operation, 'bodies', 'list', $at) as $i => $body) {
            $bodyAt = "{$at}/bodies/{$i}";
            self::expectObject($body, $bodyAt);
            self::expect($body, 'type', 'string', $bodyAt);
            self::expect($body, 'more', '?string', $bodyAt);
            foreach (self::expect($body, 'fields', 'list', $bodyAt) as $j => $field) {
                self::checkField($field, "{$bodyAt}/fields/{$j}");
            }
        }
        foreach (self::expect($operation, 'responses', 'list', $at) as $i => $response) {
            $responseAt = "{$at}/responses/{$i}";
            self::expectObject($response, $responseAt);
            self::expect($response, 'status', 'string', $responseAt);
            self::expect($response, 'description', 'string', $responseAt);
            self::expect($response, 'example', '?string', $responseAt);
        }
        if (self::expect($operation, 'samples', 'list', $at) === []) {
            throw InvalidReference::at("{$at}/samples", 'must hold at least one sample');
        }
        foreach ($operation['samples'] as $i => $sample) {
            self::expectObject($sample, "{$at}/samples/{$i}");
            self::expect($sample, 'label', 'string', "{$at}/samples/{$i}");
            self::expect($sample, 'code', 'string', "{$at}/samples/{$i}");
        }
        // The sample box switches between curl and PHP only: an SDK call in another
        // language would have nowhere to show, so it is refused, not dropped.
        $codeSamples = self::expect($operation, 'codeSamples', 'list', $at);
        if (count($codeSamples) > 1) {
            throw InvalidReference::at("{$at}/codeSamples", 'holds more than one SDK call; this site shows one (PHP)');
        }
        foreach ($codeSamples as $i => $sample) {
            self::expectObject($sample, "{$at}/codeSamples/{$i}");
            foreach (['lang', 'label', 'source'] as $key) {
                self::expect($sample, $key, 'string', "{$at}/codeSamples/{$i}");
            }
            if ($sample['lang'] !== 'PHP') {
                throw InvalidReference::at("{$at}/codeSamples/{$i}/lang", "'{$sample['lang']}': this site shows PHP SDK calls only");
            }
        }
    }

    private static function checkField($field, string $at): void
    {
        self::expectObject($field, $at);
        foreach (['name', 'in', 'type'] as $key) {
            self::expect($field, $key, 'string', $at);
        }
        self::expect($field, 'required', 'bool', $at);
        self::expect($field, 'description', '?string', $at);
        self::expect($field, 'default', '?string', $at);
    }

    /** @return mixed the value, of the type asked for */
    private static function expect(array $node, string $key, string $type, string $at)
    {
        if (!array_key_exists($key, $node)) {
            throw InvalidReference::at("{$at}/{$key}", 'is missing');
        }
        $value = $node[$key];
        switch ($type) {
            case 'string':
                $ok = is_string($value);
                break;
            case '?string':
                $ok = $value === null || is_string($value);
                break;
            case 'bool':
                $ok = is_bool($value);
                break;
            case 'list':
                $ok = is_array($value) && array_values($value) === $value;
                break;
            case 'slug':
                $ok = is_string($value) && preg_match('/\A[a-z0-9]+(-[a-z0-9]+)*\z/', $value) === 1;
                break;
            default:
                throw new \LogicException("Unknown type '{$type}'");
        }
        if (!$ok) {
            throw InvalidReference::at("{$at}/{$key}", "must be {$type}");
        }

        return $value;
    }

    private static function expectObject($node, string $at): void
    {
        if (!is_array($node) || ($node !== [] && array_values($node) === $node)) {
            throw InvalidReference::at($at, 'must be an object');
        }
    }

    private static function unique(array &$seen, string $slug, string $at): void
    {
        if (isset($seen[$slug])) {
            throw InvalidReference::at($at, "'{$slug}' is used twice");
        }
        $seen[$slug] = true;
    }
}
