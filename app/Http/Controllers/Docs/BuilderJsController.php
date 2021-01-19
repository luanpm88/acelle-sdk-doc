<?php

namespace App\Http\Controllers\Docs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class BuilderJsController extends Controller
{
    /**
     * API document home.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        if(!$request->session()->exists('theme')) {
            $request->session()->put('theme', 'dark-theme');
        }

        return view('docs.builderjs.index', [
            'resources' => $this->getResources(),
        ]);
    }

    public function getResources()
    {
        $resources = [
            [
                "name" => "introduction",
                "type" => "all",
                "title" => "Introduction",
                "desc" => "Welcome to BuilderJS 4.0, the most powerful Email or Web Page Builder tool.",                
            ],
            [
                "name" => "installation",
                "type" => "all",
                "title" => "Installation",
                "desc" => "BuilderJS comes with init() helper function allowing you to quickly initiate the builder and append it to your current web page.",
                "children" => [
                    [
                        "name" => "quick_start",
                        "title" => "Quick start",
                        "desc" => "Simply include the BuilderJS JavaScript and CSS files to your HTML page and initiate it on page load",
                    ],
                    [
                        "name" => "important",
                        "title" => "Important",
                        "desc" => "nstantiate the builder object and use init() helper function is the easiest way",
                    ],
                    [
                        "name" => "examples",
                        "title" => "Examples",
                        "desc" => "BuilderJS also comes with a sample package so that you can quickly explore the builder features",
                    ],
                    [
                        "name" => "advanced",
                        "title" => "Advanced",
                        "desc" => "See the right panel for a more complicated setup.",
                    ],
                ],                
            ],
        ];

        foreach($resources as $key => &$resource) {
            if (isset($resource['children'])) {
                foreach($resource['children'] as $key2 => &$resource2) {
                    $resource2['content'] = view('docs.builderjs.' . $resource['name'] . '.' . $resource2['name'], [
                        'resource' => $resource2,
                    ]);
                }
            }

            $resource['content'] = view('docs.builderjs._' . $resource['name'], [
                'resource' => $resource,
            ]);
        }

        return $resources;
    }
}