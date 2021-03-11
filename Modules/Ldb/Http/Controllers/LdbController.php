<?php

namespace Modules\Ldb\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class LdbController extends Controller
{
    public function newProject()
    {
        return view('ldb::laravel.new-project');
    }

    public function front()
    {
        return view('ldb::laravel.front');
    }

    public function pageBuilder()
    {
        return view('ldb::laravel.page-builder');
    }

}
