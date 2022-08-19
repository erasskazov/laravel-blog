<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

// Должен наследоваться от Controller
class PageController extends BaseController
{
    public function about()
    {
        // Точка используется вместо /.
        // То есть шаблон находится по пути resources/views/page/about.blade.php
        return view('page.about');
    }
}