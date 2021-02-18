<?php

namespace Modules\Ldb\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Ldb\Entities\Category;

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

}
