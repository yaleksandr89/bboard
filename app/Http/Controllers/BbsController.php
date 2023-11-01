<?php

namespace App\Http\Controllers;

use App\Models\Bb;

class BbsController extends Controller
{
    public function index()
    {
        $bbs = Bb::with('user')
            ->latest()
            ->paginate(12);

        return view('bbs.index', compact('bbs'));
    }

    public function detail(Bb $bb)
    {
        return view('bbs.detail', compact('bb'));
    }
}
