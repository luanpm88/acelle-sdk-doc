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
    public function index(Request $request)
    {
        if(!$request->session()->exists('theme')) {
            $request->session()->put('theme', 'dark-theme');
        }

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
                "desc" => "The Acelle API is organized around REST. Our API has predictable resource-oriented URLs, accepts form-encoded request bodies, returns JSON-encoded responses, and uses standard HTTP response codes, authentication, and verbs.",                
            ],
            [
                "name" => "authentication",
                "type" => "all",
                "title" => "Authentication",  
                "desc" => "Generate one time login token. User can login by visiting the following URL",              
            ],
            [
                "name" => "mail_lists",
                "type" => "frontend",
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
                "type" => "frontend",
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
                "type" => "frontend",
                "title" => "Campaigns",      
                "desc" => "Manage campaigns",  
                "children" => [
                    [
                        "name" => "campaigns_all",
                        "title" => "All Campaigns",
                        "desc" => "Get information about all campaigns",
                    ],
                    [
                        "name" => "campaigns_find",
                        "title" => "Find a Campaign",
                        "desc" => "Get information about a specific campaign",
                    ],
                ]        
            ],
            [
                "name" => "notifications",
                "type" => "frontend",
                "title" => "Notifications",      
                "desc" => "Send a delivery or abuse report to Acelle Mail which could be a success / bounce / feedback or abuse report",
            ],
            [
                "name" => "files",
                "type" => "frontend",
                "title" => "File",      
                "desc" => "Upload file(s) to customer's storage",
            ],
            [
                "name" => "backend_plans",
                "type" => "backend",
                "title" => "Plans",      
                "desc" => "Manage plans",
                "children" => [
                    [
                        "name" => "backend_plan_find",
                        "title" => "Find a Plan",
                        "desc" => "Get information about a specific plan",
                    ],
                    [
                        "name" => "backend_plan_add",
                        "title" => "Add new Plan",
                        "desc" => "Add new plan",
                    ],
                ],
            ],
            [
                "name" => "backend_sending_servers",
                "type" => "backend",
                "title" => "Sending Servers",      
                "desc" => "Get information about all sending servers",
            ],
            [
                "name" => "backend_customers",
                "type" => "backend",
                "title" => "Customers",      
                "desc" => "Manage customers",
                "children" => [                    
                    [
                        "name" => "backend_customers_add",
                        "title" => "Add new Customer",
                        "desc" => "Add new customer",
                    ],
                    [
                        "name" => "backend_customers_find",
                        "title" => "Find a Customer",
                        "desc" => "Get information about a specific customer",
                    ],
                    [
                        "name" => "backend_customers_update",
                        "title" => "Update Customer",
                        "desc" => "Update customer information",
                    ],
                    [
                        "name" => "backend_customers_enable",
                        "title" => "Enable Customer",
                        "desc" => "Enable customer",
                    ],
                    [
                        "name" => "backend_customers_disable",
                        "title" => "Disable Customer",
                        "desc" => "Disable customer",
                    ],
                    [
                        "name" => "backend_customers_assign",
                        "title" => "Assign Plan",
                        "desc" => "Assign Plan to Customer",
                    ],
                ],
            ],
            [
                "name" => "backend_subscriptions",
                "type" => "backend",
                "title" => "Subscriptions",      
                "desc" => "Manage subscriptions",
                "children" => [                    
                    [
                        "name" => "backend_subscriptions_subscribe",
                        "title" => "Subscribe",
                        "desc" => "Subscribe customer to a plan",
                    ],
                    [
                        "name" => "backend_subscriptions_activate",
                        "title" => "Activate subscription",
                        "desc" => "Admin activate pending subscription",
                    ],
                ],
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