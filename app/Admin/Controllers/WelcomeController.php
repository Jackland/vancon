<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;

class WelcomeController extends Controller
{

    public function index()
    {
        return 'hello welcome-index';
    }

    public static function title()
    {
        return view('admin.dashboard.index');
    }
}
