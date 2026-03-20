<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function update(Request $request): void
    {
        $request->validate([
            'theme' => 'required|in:light,dark,system',
        ]);

        $request->user()->update(['theme' => $request->theme]);
    }
}
