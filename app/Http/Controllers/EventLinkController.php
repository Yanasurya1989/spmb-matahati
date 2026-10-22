<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventLink;
use Illuminate\Validation\Rule;
use App\Models\Admin;
use App\Models\SiteBackground;

class EventLinkController extends Controller
{
    // HALAMAN PUBLIK
    public function old_home()
    {
        $links = EventLink::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('public.index', compact('links'));
    }

    public function home()
    {
        $links = EventLink::where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        $background = SiteBackground::where('is_active', true)
            ->latest('id')
            ->first();

        $backgroundImage = null;

        if ($background) {
            if ($background->image_path) {
                $backgroundImage = asset(
                    'storage/' . $background->image_path
                );
            } elseif ($background->image_url) {
                $backgroundImage = $background->image_url;
            }
        }

        $overlayOpacity = $background
            ? $background->overlay_opacity / 100
            : 0.85;

        return view('public.index', compact(
            'links',
            'backgroundImage',
            'overlayOpacity'
        ));
    }

    // DAFTAR TAUTAN DI ADMIN
    public function index()
    {
        if (!$this->isAdminLoggedIn()) {
            return redirect()->route('admin.login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $links = EventLink::orderBy('sort_order')
            ->orderBy('id')
            ->paginate(10);

        return view('admin.event-links.index', compact('links'));
    }

    // FORM TAMBAH
    public function create()
    {
        if (!$this->isAdminLoggedIn()) {
            return redirect()->route('admin.login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('admin.event-links.create');
    }

    // SIMPAN DATA
    public function store(Request $request)
    {
        if (!$this->isAdminLoggedIn()) {
            return redirect()->route('admin.login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:2048'],
            'icon' => ['required', 'string', 'max:30'],
            'type' => ['required', Rule::in(['link', 'pdf'])],
            'show_download' => ['nullable', 'boolean'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        $validated['show_download'] =
            $request->boolean('show_download');

        $validated['is_active'] = $request->boolean('is_active');

        EventLink::create($validated);

        return redirect()
            ->route('admin.event-links.index')
            ->with('success', 'Tautan berhasil ditambahkan.');
    }

    // FORM EDIT
    public function edit(EventLink $eventLink)
    {
        if (!$this->isAdminLoggedIn()) {
            return redirect()->route('admin.login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        return view(
            'admin.event-links.edit',
            compact('eventLink')
        );
    }

    // UPDATE DATA
    public function update(Request $request, EventLink $eventLink)
    {
        if (!$this->isAdminLoggedIn()) {
            return redirect()->route('admin.login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url', 'max:2048'],
            'icon' => ['required', 'string', 'max:30'],
            'type' => ['required', Rule::in(['link', 'pdf'])],
            'show_download' => ['nullable', 'boolean'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);

        $validated['show_download'] =
            $request->boolean('show_download');

        $validated['is_active'] = $request->boolean('is_active');

        $eventLink->update($validated);

        return redirect()
            ->route('admin.event-links.index')
            ->with('success', 'Tautan berhasil diperbarui.');
    }

    // HAPUS SATU DATA
    public function destroy(EventLink $eventLink)
    {
        if (!$this->isAdminLoggedIn()) {
            return redirect()->route('admin.login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $eventLink->delete();

        return redirect()
            ->route('admin.event-links.index')
            ->with('success', 'Tautan berhasil dihapus.');
    }

    // HAPUS BEBERAPA DATA SEKALIGUS
    public function bulkDestroy(Request $request)
    {
        if (!$this->isAdminLoggedIn()) {
            return redirect()->route('admin.login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $validated = $request->validate([
            'ids' => ['required', 'array', 'min:1'],
            'ids.*' => ['required', 'integer', 'distinct', 'exists:event_links,id'],
        ]);

        EventLink::whereIn('id', $validated['ids'])->delete();

        return redirect()
            ->route('admin.event-links.index')
            ->with('success', 'Tautan terpilih berhasil dihapus.');
    }

    private function isAdminLoggedIn(): bool
    {
        return session()->has('admin_id')
            && Admin::whereKey(session('admin_id'))->exists();
    }
}
