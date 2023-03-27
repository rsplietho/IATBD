<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function navigation() {
        $pages = Page::orderBy('order')->Get();
        return view()
    }
}
