<?php

namespace App\Seo;

/**
 * Absolute addresses of this site, for what search engines and AI assistants keep:
 * canonical links, the sitemap, robots.txt, llms.txt, structured data, og:image.
 * Built from APP_URL, never from the host a request came in on (www, http, a proxy).
 */
final class SiteUrl
{
    public static function to(string $path): string
    {
        $base = rtrim((string) config('app.url'), '/');
        if (!preg_match('#\Ahttps?://[^/]+\z#', $base)) {
            throw new \LogicException("APP_URL must be the site's address, e.g. https://api.acellesend.com (got '{$base}')");
        }

        return $base.'/'.ltrim($path, '/');
    }

    /** The address of a named route. */
    public static function route(string $name, $parameters = []): string
    {
        return self::to(route($name, $parameters, false));
    }
}
