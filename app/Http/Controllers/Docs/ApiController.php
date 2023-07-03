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
                "name" => "one_click_token",
                "type" => "all",
                "title" => "One-click Login",  
                "desc" => "Obtain a one-time login token as well as the one-time login URL",              
            ],
            [
                "name" => "mail_lists",
                "type" => "frontend",
                "title" => "Lists",
                "desc" => "Manage mail lists or audience",
                "children" => [
                    [
                        "name" => "mail_lists_all",
                        "title" => "View Lists",
                        "desc" => "Get information about all lists",
                    ],
                    [
                        "name" => "mail_lists_new",
                        "title" => "Create List",
                        "desc" => "Create a new list that contains contacts for sending emails",
                    ],
                    [
                        "name" => "mail_lists_find",
                        "title" => "Get List Details",
                        "desc" => "Get information about a specific list",
                    ],
                    [
                        "name" => "mail_lists_add_custom_field",
                        "title" => "Add Custom Field",
                        "desc" => "Add custom fields to list",
                    ],
                    [
                        "name" => "mail_lists_delete",
                        "title" => "Delete",
                        "desc" => "Completely delete list",
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
                        "title" => "List Subscribers",
                        "desc" => "List all subscribers in a given mail list",
                    ],
                    [
                        "name" => "subscribers_create",
                        "title" => "Add Subscriber",
                        "desc" => "Add new subscribers to list",
                    ],
                    [
                        "name" => "subscribers_find",
                        "title" => "Get Subscriber Details",
                        "desc" => "Get details of a subscriber",
                    ],
                    [
                        "name" => "subscribers_update",
                        "title" => "Update Subscriber",
                        "desc" => "Update subscriber attributes like names, addresses, ages, etc.",
                    ],
                    [
                        "name" => "subscribers_find_by_email",
                        "title" => "Find by Email",
                        "desc" => "Find subscribers by a given email address",
                    ],
                    [
                        "name" => "subscribers_add_tag",
                        "title" => "Add Tag",
                        "desc" => "Add tags to a subscriber",
                    ],
                    [
                        "name" => "subscribers_subscribe",
                        "title" => "Subscribe",
                        "desc" => "Subscribe a contact to a given list",
                    ],
                    [
                        "name" => "subscribers_unsubscribe",
                        "title" => "Unsubscribe",
                        "desc" => "Unsubscribe a contact from list",
                    ],
                    [
                        "name" => "subscribers_remove",
                        "title" => "Delete",
                        "desc" => "Completely remove a subscriber from list",
                    ],
                ],
            ],
            [
                "name" => "campaigns",
                "type" => "frontend",
                "title" => "Campaigns",      
                "desc" => "Manage email campaigns",  
                "children" => [
                    [
                        "name" => "campaigns_all",
                        "title" => "List Campaigns",
                        "desc" => "List all campaigns available",
                    ],
                    [
                        "name" => "campaigns_add",
                        "title" => "Add new campaign",
                        "desc" => "Add new campaign",
                    ],
                    [
                        "name" => "campaigns_update",
                        "title" => "Update Campaign",
                        "desc" => "Update a specific campaign by uid",
                    ],
                    [
                        "name" => "campaigns_find",
                        "title" => "Get Campaign Details",
                        "desc" => "Get detailed information of a campaign",
                    ],
                    [
                        "name" => "campaigns_run",
                        "title" => "Run a Campaign",
                        "desc" => "Run a campaign",
                    ],
                    [
                        "name" => "campaigns_pause",
                        "title" => "Pause a Campaign",
                        "desc" => "Pause a running campaign",
                    ],
                    [
                        "name" => "campaigns_resume",
                        "title" => "Resume a Campaign",
                        "desc" => "Resume a paused campaign",
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
                "title" => "Assets",      
                "desc" => "Manage customer's assets in server storage",
            ],
            [
                "name" => "backend_plans",
                "type" => "backend",
                "title" => "Plans",
                "desc" => "Manage service plans in SAAS mode",
                "children" => [
                    [
                        "name" => "backend_plan_find",
                        "title" => "List Plans",
                        "desc" => "List all available plans",
                    ],
                    [
                        "name" => "backend_plan_add",
                        "title" => "Create Plan",
                        "desc" => "Create a plan with quota and other settings",
                    ],
                ],
            ],
            [
                "name" => "backend_sending_servers",
                "type" => "backend",
                "title" => "Sending Servers",
                "desc" => "Manage application's sending servers",
            ],
            [
                "name" => "backend_customers",
                "type" => "backend",
                "title" => "Customers",      
                "desc" => "Manage users or customers registered in the application",
                "children" => [                    
                    [
                        "name" => "backend_customers_add",
                        "title" => "Add Customer",
                        "desc" => "Add new customer",
                    ],
                    [
                        "name" => "backend_customers_find",
                        "title" => "Get Customer Details",
                        "desc" => "Get detailed information of a customer",
                    ],
                    [
                        "name" => "backend_customers_update",
                        "title" => "Update Customer",
                        "desc" => "Update customer's information",
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
                        "desc" => "Assign a plan to a customer",
                    ],
                    [
                        "name" => "backend_customers_delete",
                        "title" => "Delete Customer",
                        "desc" => "Delete a customer",
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
                        "name" => "backend_subscriptions_list",
                        "title" => "Subscription List",
                        "desc" => "List all subscriptions",
                    ],
                    [
                        "name" => "backend_subscriptions_subscribe",
                        "title" => "Create Subscription",
                        "desc" => "Subscribe customer to a plan",
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
