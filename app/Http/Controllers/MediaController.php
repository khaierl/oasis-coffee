<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    /** Serve uploads without requiring a public/storage symbolic link. */
    public function show(string $path)
    {
        abort_unless(
            $path !== '' && ! str_contains($path, '..') && Storage::disk('public')->exists($path),
            404
        );

        return Storage::disk('public')->response($path);
    }
}
