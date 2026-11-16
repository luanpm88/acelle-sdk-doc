#!/usr/bin/env bash
# Copy the API reference from the application into this site.
#
#   scripts/sync-api-reference.sh <path to the application checkout>
#
# The application's store (resources/api/) is the only place the reference is written.
# Its `php artisan api-docs:export` writes the file this site reads; nothing in
# resources/api-reference.json is edited by hand. Commit the file after a sync.
set -euo pipefail

app="${1:?usage: scripts/sync-api-reference.sh <path to the application checkout>}"
site="$(cd "$(dirname "$0")/.." && pwd)"
tmp="$(mktemp)"
trap 'rm -f "$tmp"' EXIT

(cd "$app" && php artisan api-docs:export "$tmp")
# The site reads the file before it replaces the old one: a file it cannot show stops here.
php -r '
require $argv[1]."/vendor/autoload.php";
$app = require $argv[1]."/bootstrap/app.php";
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
App\ApiReference\Reference::load($argv[2]);
' "$site" "$tmp"
chmod 644 "$tmp"
mv "$tmp" "$site/resources/api-reference.json"
trap - EXIT
echo "resources/api-reference.json updated — review the diff and commit it."
