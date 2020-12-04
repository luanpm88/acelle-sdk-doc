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
}