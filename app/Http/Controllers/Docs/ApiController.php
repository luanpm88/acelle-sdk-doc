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
        return view('docs.api.index');
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
     * Lookup.
     *
     * @return \Illuminate\View\View
     */
    public function lookup(Request $request)
    {
        sleep(1);
        return response()->json([
            [
                'title' => 'Sending Servers',
                'cat' => 'Sending',
                'link' => '#subscribers',
                'desc' => 'objects allow you to perform recurring charges, and to track
                    multiple charges, that are associated with the same customer. The API allows
                    you to create, delete, and update your customers. You can retrieve individual
                    customers as well as a list of all your customers.
                    
                    Related guide:',
            ],
            [
                'title' => 'Create a List',
                'cat' => 'Mail Lists',
                'link' => '#mail_lists_new',
                'desc' => 'Create a new list that contains contacts for sending emails',
            ],
            [
                'title' => 'Unsubscribe',
                'cat' => 'Subscribers',
                'link' => '#subscribers_unsubscribe',
                'desc' => 'Create a new list that contains contacts for sending emails',
            ],
            [
                'title' => 'Campaign Statistics',
                'cat' => 'Campaigns',
                'link' => '#campaigns',
                'desc' => 'Create a new list that contains contacts for sending emails',
            ],
        ]);
    }
}