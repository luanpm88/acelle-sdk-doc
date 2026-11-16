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

## Deploying

`APP_URL` must be the site's public address (`https://api.acellesend.com`): the canonical
link of every page, the sitemap and robots.txt are built from it, not from the address a
request came in on.

## Tests

    ./vendor/bin/phpunit
