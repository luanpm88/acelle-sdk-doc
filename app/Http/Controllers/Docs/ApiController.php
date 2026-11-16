<?php

namespace App\Http\Controllers\Docs;

use App\ApiReference\Reference;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Every page of the site, read from the reference file (App\ApiReference\Reference).
 * One page per endpoint, so each can be found and linked on its own.
 */
class ApiController extends Controller
{
    /** Overview: introduction, guides, every endpoint by section. */
    public function index(Request $request, Reference $reference)
    {
        $this->rememberTheme($request);

        return view('docs.api.index', [
            'reference' => $reference,
            'current' => 'home',
            'currentSection' => null,
            'pageTitle' => 'Acelle Mail API reference',
            'pageDescription' => 'Reference of the Acelle Mail REST API: lists, subscribers, campaigns, automations, customers and plans, with a curl and PHP sample for every endpoint.',
            'canonical' => $this->canonical(route('home', [], false)),
        ]);
    }

    public function guide(Request $request, Reference $reference, string $guide)
    {
        $page = $reference->guide($guide);
        if ($page === null) {
            abort(404);
        }
        $this->rememberTheme($request);

        return view('docs.api.guide', [
            'reference' => $reference,
            'guide' => $page,
            'current' => 'guide/'.$page['slug'],
            'currentSection' => null,
            'pageTitle' => $page['title'].' | Acelle Mail API',
            'pageDescription' => $this->excerpt($page['html']),
            'canonical' => $this->canonical(route('guide', $page['slug'], false)),
        ]);
    }

    public function section(Request $request, Reference $reference, string $section)
    {
        $page = $reference->section($section);
        if ($page === null) {
            abort(404);
        }
        $this->rememberTheme($request);

        return view('docs.api.section', [
            'reference' => $reference,
            'section' => $page,
            'current' => $page['slug'],
            'currentSection' => $page['slug'],
            'pageTitle' => $page['name'].' | Acelle Mail API',
            'pageDescription' => $page['description'] ?? $page['name'].' endpoints of the Acelle Mail REST API.',
            'canonical' => $this->canonical(route('section', $page['slug'], false)),
        ]);
    }

    public function operation(Request $request, Reference $reference, string $section, string $operation)
    {
        $sectionPage = $reference->section($section);
        $page = $sectionPage === null ? null : $reference->operation($sectionPage, $operation);
        if ($page === null) {
            abort(404);
        }
        $this->rememberTheme($request);

        $description = $page['method'].' '.$page['path'].' — '.$page['summary'].'.';
        if ($page['description'] !== null) {
            $description .= ' '.$this->excerpt($page['description']);
        }

        return view('docs.api.operation', [
            'reference' => $reference,
            'section' => $sectionPage,
            'operation' => $page,
            'current' => $sectionPage['slug'].'/'.$page['slug'],
            'currentSection' => $sectionPage['slug'],
            'pageTitle' => $page['summary'].' | Acelle Mail API',
            'pageDescription' => Str::limit($description, 160),
            'canonical' => $this->canonical(route('operation', [$sectionPage['slug'], $page['slug']], false)),
        ]);
    }

    public function sitemap(Reference $reference)
    {
        $paths = [route('home', [], false)];
        foreach ($reference->guides() as $guide) {
            $paths[] = route('guide', $guide['slug'], false);
        }
        foreach ($reference->sections() as $section) {
            $paths[] = route('section', $section['slug'], false);
            foreach ($section['operations'] as $operation) {
                $paths[] = route('operation', [$section['slug'], $operation['slug']], false);
            }
        }

        return response()
            ->view('docs.api.sitemap', ['urls' => array_map([$this, 'canonical'], $paths)])
            ->header('Content-Type', 'application/xml; charset=UTF-8');
    }

    public function robots()
    {
        $lines = [
            'User-agent: *',
            'Disallow: /docs/api/',
            'Sitemap: '.$this->canonical(route('sitemap', [], false)),
        ];

        return response(implode("\n", $lines)."\n")->header('Content-Type', 'text/plain; charset=UTF-8');
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

    private function rememberTheme(Request $request): void
    {
        if (!$request->session()->exists('theme')) {
            $request->session()->put('theme', 'dark-theme');
        }
    }

    /**
     * The address search engines are told to keep: APP_URL, not the host the request
     * came in on (www, http, a proxy's name).
     */
    public function canonical(string $path): string
    {
        return rtrim(config('app.url'), '/').$path;
    }

    private function excerpt(string $html): string
    {
        return Str::limit(trim(preg_replace('/\s+/', ' ', html_entity_decode(strip_tags($html), ENT_QUOTES))), 155);
    }
}
