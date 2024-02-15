<?php

namespace App\Http\Controllers;

use App\Models\Result;
use Illuminate\Http\Request;

class RankController extends Controller
{
    public function index()
    {
        $results = Result::with(['member'])->orderBy('result', 'DESC')->get();

        return view('pages.admin.perankingan.rank', compact('results'));
    }
}
