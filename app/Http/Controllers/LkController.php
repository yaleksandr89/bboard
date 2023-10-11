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
    private const BB_VALIDATOR = [
        'title' => 'required|min:5|max:150',
        'content' => 'required|min:5|max:5000',
        'price' => 'required|numeric',
    ];

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
        $bbs = $user
            ->bbs()
            ->latest()
            ->paginate(perPage: 10, pageName: 'bbs');

        $trashedBbs = $user
            ->bbs()->onlyTrashed()
            ->latest()
            ->paginate(perPage: 10, pageName: 'trashed_bbs');

        return view('lk.index', compact('bbs', 'trashedBbs'));
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

        $validated = $request->validate(self::BB_VALIDATOR);

        $user
            ->bbs()
            ->create([
                'title' => $validated['title'],
                'content' => $validated['content'],
                'price' => $validated['price'],
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
        $validated = $request->validate(self::BB_VALIDATOR);

        $bb->fill([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'price' => $validated['price'],
        ]);
        $bb->save();

        return redirect()
            ->back()
            ->with('success', trans('notification.bb.update.success'));
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

    public function deleted(int $id)
    {
        $deletedDb = Bb::withTrashed()
            ->findOrFail($id);

        return view('lk.deleted', compact('deletedDb'));
    }

    public function restore(Request $request, int $id): RedirectResponse
    {
        $deletedDb = Bb::withTrashed()
            ->findOrFail($id);

        $validated = $request->validate(self::BB_VALIDATOR);

        $deletedDb->fill([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'price' => $validated['price'],
        ]);
        $deletedDb->deleted_at = null;

        $deletedDb
            ->save();

        return redirect()
            ->route('lk.index')
            ->with('success', trans('notification.bb.restored.success', ['id' => $deletedDb->id]));
    }
}
