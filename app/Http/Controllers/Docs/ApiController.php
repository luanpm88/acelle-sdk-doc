<?php

namespace App\Http\Controllers\Docs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class ApiController extends Controller
{
    /**
     * API document home.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('docs.api.index', [
            'resources' => $this->getResources(),
        ]);
    }

    /**
     * Save theme option.
     *
     * @return \Illuminate\View\View
     */
    public function saveTheme(Request $request)
    {
        $request->session()->put('theme', $request->theme);
    }

    /**
     * Save lang option.
     *
     * @return \Illuminate\View\View
     */
    public function saveLang(Request $request)
    {
        $request->session()->put('lang', $request->lang);
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
                    $result[] = [
                        'title' => $resource2['title'],
                        'cat' => $resource['title'],
                        'link' => '#' . $resource2['name'],
                        'desc' => $resource2['desc'],
                    ];
                }
            }

            $result[] = [
                'title' => $resource['title'],
                'cat' => 'Sending',
                'link' => '#' . $resource['name'],
                'desc' => $resource['desc'],
            ];
        }

        sleep(1);
        return response()->json($result);
    }

    public function getResources()
    {
        $resources = [
            [
                "name" => "introduction",
                "title" => "Introduction",
                "desc" => "The Acelle API is organized around REST. Our API has predictable resource-oriented URLs, accepts form-encoded request bodies, returns JSON-encoded responses, and uses standard HTTP response codes, authentication, and verbs.",                
            ],
            [
                "name" => "authentication",
                "title" => "Authentication",  
                "desc" => "Generate one time login token. User can login by visiting the following URL",              
            ],
            [
                "name" => "mail_lists",
                "title" => "Mail Lists",
                "desc" => "Manage mail lists",
                "children" => [
                    [
                        "name" => "mail_lists_new",
                        "title" => "Create new List",
                        "desc" => "Create a new list that contains contacts for sending emails",
                    ],
                    [
                        "name" => "mail_lists_all",
                        "title" => "View Lists",
                        "desc" => "Get information about all lists",
                    ],
                    [
                        "name" => "mail_lists_find",
                        "title" => "Find a List",
                        "desc" => "Get information about a specific list",
                    ],
                    [
                        "name" => "mail_lists_add_custom_field",
                        "title" => "Add Custom Field",
                        "desc" => "Add custom field to list",
                    ],
                ],                
            ],
            [
                "name" => "subscribers",
                "title" => "Subscribers",
                "desc" => "Manage mail list's subscribers",
                "children" => [
                    [
                        "name" => "subscribers_all",
                        "title" => "All Subscribers",
                        "desc" => "",
                    ],
                    [
                        "name" => "subscribers_create",
                        "title" => "Add new Subscriber",
                        "desc" => "Add new subscriber to list",
                    ],
                    [
                        "name" => "subscribers_find",
                        "title" => "Find a Subscriber",
                        "desc" => "Find a Subscriber",
                    ],
                    [
                        "name" => "subscribers_update",
                        "title" => "Update",
                        "desc" => "Update Subscriber Information",
                    ],
                    [
                        "name" => "subscribers_find_by_email",
                        "title" => "Find by Email",
                        "desc" => "Find Subscriber by Email",
                    ],
                    [
                        "name" => "subscribers_subscribe",
                        "title" => "Subscribe",
                        "desc" => "Subscribe",
                    ],
                    [
                        "name" => "subscribers_unsubscribe",
                        "title" => "Unsubscribe",
                        "desc" => "Unsubscribe",
                    ],
                    [
                        "name" => "subscribers_remove",
                        "title" => "Remove Subscriber",
                        "desc" => "Remove Subscriber",
                    ],
                ],                
            ],
            [
                "name" => "campaigns",
                "title" => "Campaigns",      
                "desc" => "You can use the Stripe API in test mode, which does not affect your live data or interact",          
            ],
        ];

        foreach($resources as $key => &$resource) {
            if (isset($resource['children'])) {
                foreach($resource['children'] as $key2 => &$resource2) {
                    $resource2['content'] = view('docs.api.' . $resource['name'] . '.' . $resource2['name'], [
                        'resource' => $resource2,
                    ]);
                }
            }

            $resource['content'] = view('docs.api._' . $resource['name'], [
                'resource' => $resource,
            ]);
        }

        return $resources;
    }
}