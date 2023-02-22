<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    //
    public function dashboard(): RedirectResponse|View
    {
        return view('admin.dashboard');
    }
}
