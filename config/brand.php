<?php

/*
| The brand this site belongs to: AcelleMail, whose home is acellesend.com.
| Every link to the brand's site and every brand name on the pages, in the
| structured data and in llms.txt comes from here.
|
| The organization matches the one acellesend.com declares in its own JSON-LD
| (name, url, logo, description), so search engines and AI assistants see one
| entity. `sameAs` is left out on purpose: the brand's list still holds the
| former marketplace listing, which this site no longer links to.
*/
return [
    'name' => 'AcelleMail',
    'alternate_names' => ['Acelle Mail'],
    'url' => 'https://acellesend.com',
    'logo' => 'https://acellesend.com/apple-touch-icon.png',
    'description' => 'Self-hosted email marketing platform with full source code included. Send unlimited campaigns through your own Amazon SES, SendGrid, or any SMTP service — one-time license, no recurring fees.',

    // This site.
    'site_name' => 'AcelleMail API',

    'links' => [
        'pricing' => 'https://acellesend.com/pricing',
        'demo' => 'https://acellesend.com/demo',
        'kb' => 'https://acellesend.com/kb',
        'installation' => 'https://acellesend.com/kb/category/installation-setup',
        'developer_guide' => 'https://acellesend.com/kb/category/developer-guide',
        'contact' => 'https://acellesend.com/contact',
        'rest_api' => 'https://acellesend.com/rest-api',
        'sdk' => 'https://packagist.org/packages/acelle/sdk-php',
    ],
];
