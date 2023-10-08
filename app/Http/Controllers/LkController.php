<?php

namespace App\Http\Controllers;

use App\Models\Bb;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use RuntimeException;

class LkController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        $user = Auth::user();

        if (!$user) {
            throw new RuntimeException('User not fount.');
        }

        $bbs = $user->bbs()->latest()->get();

        return view('lk.index', compact('bbs'));
    }

    public function create(): View
    {
        return view('lk.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $user = Auth::user();

        if (!$user) {
            throw new RuntimeException('User not fount.');
        }

        $user
            ->bbs()
            ->create([
                'title' => $request->string('title'),
                'content' => $request->string('content'),
                'price' => $request->float('price'),
            ]);

        return redirect()
            ->route('lk.index')
            ->with('success', trans('notification.bb.store.success'));
    }

    public function edit(Bb $bb): View
    {
        return view('lk.edit', compact('bb'));
    }

    public function update(Request $request, Bb $bb): RedirectResponse
    {
        $bb->fill([
            'title' => $request->string('title'),
            'content' => $request->string('content'),
            'price' => $request->float('price'),
        ]);
        $bb->save();

        return redirect()
            ->route('lk.index')
            ->with('success', trans('notification.bb.update.success', ['id' => $bb->id]));
    }

    public function delete(Bb $bb): View
    {
        return view('lk.delete', compact('bb'));
    }

    public function destroy(Bb $bb): RedirectResponse
    {
        $bb->delete();

        return redirect()
            ->route('lk.index')
            ->with('success', trans('notification.bb.destroy.success', ['id' => $bb->id]));
    }
}
