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

    /**
     * Lookup.
     *
     * @return \Illuminate\View\View
     */
    public function lookup(Request $request)
    {
        $result =[];

        foreach($this->getResources() as $key => &$resource) {
            if (isset($resource['children'])) {
                foreach($resource['children'] as $key2 => &$resource2) {
                    if (!$request->keyword || (strpos($resource2['title'], $request->keyword) !== false || strpos($resource2['desc'], $request->keyword) !== false)) {
                        $result[] = [
                            'title' => $resource2['title'],
                            'cat' => $resource['title'],
                            'link' => '#' . $resource2['name'],
                            'desc' => $resource2['desc'],
                        ];
                    }
                }
            }

            if (!$request->keyword || (strpos($resource['title'], $request->keyword) !== false || strpos($resource['desc'], $request->keyword) !== false)) {
                $result[] = [
                    'title' => $resource['title'],
                    'cat' => 'Sending',
                    'link' => '#' . $resource['name'],
                    'desc' => $resource['desc'],
                ];
            }
        }
        
        return response()->json($result);
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
                        "desc" => "Instantiate the builder object and use init() helper function is the easiest way",
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
            [
                "name" => "configuration",
                "type" => "all",
                "title" => "Configuration",
                "desc" => "BuilderJS configuration.",
                "children" => [
                    [
                        "name" => "load_template",
                        "title" => "Load a Template",
                        "desc" => "You can also start working with an existing email or page template by loading it into the design view.",
                    ],
                    [
                        "name" => "tags",
                        "title" => "Tags",
                        "desc" => "Tag is a powerful feature of BuildJS, allowing users to inject dynamic content to page or email content. ",
                    ],
                    [
                        "name" => "other_settings",
                        "title" => "Other Settings",
                        "desc" => "The complete list of configuration settings (optional) that can be passed to the Builder construction",
                    ],
                ],                
            ],
            [
                "name" => "key_features",
                "type" => "all",
                "title" => "Key Features",
                "desc" => "BuilderJS key features.",
                "children" => [
                    [
                        "name" => "drag_drop",
                        "title" => "Visual Drag & Drop Editor",
                        "desc" => "BuilderJS comes as a fully-functioned visual Drag & Drop editor, allowing you to quickly build your page or email templates without any hassle",
                    ],
                    [
                        "name" => "source_editor",
                        "title" => "Source Editor",
                        "desc" => "
                        Beside the visual Drag & Drop editor, BuilderJS also supports a Source Editor which allows you to completely customize your page or email design by updating HTML / CSS directly. ",
                    ],
                    [
                        "name" => "template",
                        "title" => "Template",
                        "desc" => "Allows you to create new blank workspace and build your design from scratch.",
                    ],
                    [
                        "name" => "responsive",
                        "title" => "Responsive",
                        "desc" => "Supports making email or pages that are fully responsive. You can preview your design with a PC, tablet or mobile phone simulator supported by BuilderJS.",
                    ],
                    [
                        "name" => "html_widgets",
                        "title" => "HTML Widgets",
                        "desc" => "Comes with lots of pre-defined HTML widgets (or block or common HTML content) like image box, text box, divider, page footer, email signature, banner, etc.",
                    ],
                    [
                        "name" => "custom_widgets",
                        "title" => "Custom Widgets",
                        "desc" => "allows you to create new blank workspace and build your design from scratch.",
                    ],
                ],                
            ],
            [
                "name" => "storage",
                "type" => "all",
                "title" => "Storage",
                "desc" => "When it comes to save, BuilderJS allows you to specify a Save URI, to which it will make a POST request, passing the latest updates to the server side scripting for handling.",
                "children" => [
                    [
                        "name" => "sample_post_request",
                        "title" => "Sample POST request",
                        "desc" => "POST http://example.com/template/save?id=02093403",
                    ],
                    [
                        "name" => "request_header",
                        "title" => "Request header",
                        "desc" => "
                        Beside the visual Drag & Drop editor, BuilderJS also supports a Source Editor which allows you to completely customize your page or email design by updating HTML / CSS directly. ",
                    ],
                    [
                        "name" => "request_parameters",
                        "title" => "Request parameters",
                        "desc" => "List of parameters passed to the server along with the request",
                    ],
                ],
            ],
            [
                "name" => "intergration",
                "type" => "all",
                "title" => "Intergration",
                "desc" => "Since BuilderJS is a pure JavaScript library, accepting parameters passed to its initialization, it is open to any kind of integration no matter what your programming language or database system is.",        
            ],
            [
                "name" => "customization",
                "type" => "all",
                "title" => "Customization",
                "desc" => "BuilderJS is written in a well designed structure, allowing easy and straightforward customization.",
                "children" => [
                    [
                        "name" => "add_customer_widget",
                        "title" => "Add custom widget",
                        "desc" => "CustomButtonWidget example",
                    ],
                ],         
            ],
            [
                "name" => "saas_support",
                "type" => "all",
                "title" => "SaaS Support",
                "desc" => "BuilderJS is also suitable for SAAS (Software as a Service). That is, you have control of how BuilderJS features are available to your users.",        
            ],
            [
                "name" => "errors",
                "type" => "all",
                "title" => "Errors",
                "desc" => "For reference, the following error codes should be used by the server side scripting to better communicate with BuilderJS",        
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