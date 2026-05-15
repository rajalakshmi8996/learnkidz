<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PuzzleController extends Controller
{
    public function index()
    {
        return view('kids.puzzles.index');
    }

    public function counting()
    {
        return view('kids.puzzles.counting');
    }

    public function findDifference()
    {
        return view('kids.puzzles.find-difference');
    }

    public function shapes()
    {
        return view('kids.puzzles.shapes');
    }
}