# API reference site

The public reference of the application's REST API: one page per guide, per section and
per endpoint, a sitemap, and the PHP SDK call next to the curl sample where the SDK has one.

## Where the content comes from

Nothing here is written by hand. The application keeps the reference in its own store
(`resources/api/`, OpenAPI YAML, checked against its routes by its tests). Its command
`php artisan api-docs:export <file>` writes what the pages show — curl samples, SDK
calls, example answers, Markdown already turned into HTML — to one JSON file, and this
site renders `resources/api-reference.json`.

After the API changes in the application:

    scripts/sync-api-reference.sh /path/to/the/application
    git diff resources/api-reference.json    # review
    git commit resources/api-reference.json

The script refuses a file this site cannot show (`App\ApiReference\Reference` checks
every key the pages read and names the one that is wrong), and leaves the old file in
place.

## Pages

| Address | Page |
|---|---|
| `/` | Introduction, guides, every endpoint |
| `/guides/{guide}` | One guide |
| `/{section}` | The endpoints of one section |
| `/{section}/{operation}` | One endpoint, e.g. `/lists/create-list` |
| `/sitemap.xml`, `/robots.txt` | For search engines |

## Brand and search

The site belongs to AcelleMail, whose home is acellesend.com. Every brand name and every
link to acellesend.com (pricing, demo, knowledge base, contact) comes from
`config/brand.php`; the logos and icons in `public/` are copies of acellesend.com's.

What search engines and AI assistants read is built from the reference file too:

- per page: title, description, canonical, Open Graph / Twitter tags, JSON-LD
  (`App\Seo\StructuredData`: WebSite + the AcelleMail Organization on every page;
  WebPage, TechArticle, CollectionPage or APIReference; a breadcrumb below the overview);
- `/sitemap.xml`: every page;
- `/robots.txt`: the AI crawlers named one by one, with acellesend.com's Content-Signal
  policy (search and live answers yes, model training no);
- `/llms.txt` (`App\Seo\LlmsTxt`, https://llmstxt.org): every guide and endpoint with
  one line each, for AI assistants.

## Deploying

`APP_URL` must be the site's public address (`https://api.acellesend.com`): the canonical
link of every page, the sitemap and robots.txt are built from it, not from the address a
request came in on.

## Tests

    ./vendor/bin/phpunit
