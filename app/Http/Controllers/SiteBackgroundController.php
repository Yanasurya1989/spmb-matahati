<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\SiteBackground;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class SiteBackgroundController extends Controller
{
    private function isAdminLoggedIn(): bool
    {
        return session()->has('admin_id')
            && Admin::whereKey(session('admin_id'))->exists();
    }

    public function index()
    {
        if (!$this->isAdminLoggedIn()) {
            return redirect()->route('admin.login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $background = SiteBackground::first();

        return view('admin.backgrounds.index', compact('background'));
    }

    public function update(Request $request)
    {
        if (!$this->isAdminLoggedIn()) {
            return redirect()->route('admin.login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        $background = SiteBackground::first();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'source' => ['required', 'in:upload,url'],
            // 'image' => [
            //     'nullable',
            //     'image',
            //     'mimes:jpg,jpeg,png,webp',
            //     'max:5120',
            // ],

            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:102400'],

            'image_url' => [
                'nullable',
                'required_if:source,url',
                'url',
                'max:2048',
            ],
            'overlay_opacity' => [
                'required',
                'integer',
                'between:0,100',
            ],
        ]);

        if (
            $validated['source'] === 'upload'
            && !$request->hasFile('image')
            && !$background?->image_path
        ) {
            throw ValidationException::withMessages([
                'image' => 'Silakan pilih gambar background terlebih dahulu.',
            ]);
        }

        $imagePath = $background?->image_path;
        $imageUrl = $background?->image_url;

        if ($validated['source'] === 'upload') {
            $imageUrl = null;

            if ($request->hasFile('image')) {
                $newPath = $request->file('image')
                    ->store('backgrounds', 'public');

                if ($imagePath) {
                    Storage::disk('public')->delete($imagePath);
                }

                $imagePath = $newPath;
            }
        } else {
            $imageUrl = $validated['image_url'];
            $imagePath = null;

            if ($background?->image_path) {
                Storage::disk('public')->delete(
                    $background->image_path
                );
            }
        }

        $background ??= new SiteBackground();

        $background->fill([
            'name' => $validated['name'],
            'image_path' => $imagePath,
            'image_url' => $imageUrl,
            'overlay_opacity' => $validated['overlay_opacity'],
            'is_active' => $request->boolean('is_active'),
        ]);

        $background->save();

        return redirect()
            ->route('admin.backgrounds.index')
            ->with('success', 'Pengaturan background berhasil disimpan.');
    }
}
