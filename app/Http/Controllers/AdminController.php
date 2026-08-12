<?php

namespace App\Http\Controllers;

use App\Models\BloomUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function index(): View
    {
        return view('admin.users');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'bloom_username' => ['required', 'string', 'max:255', 'unique:bloom.bloom_user,bloom_username'],
            'bloom_password' => ['required', 'string', 'min:6'],
            'bloom_role' => ['required', 'in:admin,user'],
        ]);

        BloomUser::create([
            'bloom_username' => $validated['bloom_username'],
            'bloom_password' => $validated['bloom_password'],
            'bloom_role' => $validated['bloom_role'],
        ]);

        return redirect()->route('admin.users')
            ->with('success', 'User created successfully.');
    }
}
