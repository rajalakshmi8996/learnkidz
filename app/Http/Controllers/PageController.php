<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;

class PageController extends Controller
{
    public function parent()
    {
        $results = Result::latest()->get();

        return view('parent.dashboard', compact('results'));
    }
}