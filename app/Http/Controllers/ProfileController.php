<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'bio' => 'nullable|string',
            'location' => 'nullable|string',
            'skills' => 'nullable|string',
        ]);

        $profile = Profile::updateOrCreate(
            ['user_id' => Auth::id()],
            $request->only('full_name', 'bio', 'location', 'skills')
        );

        return response()->json($profile, 201);
    }

    public function show()
    {
        $profile = Auth::user()->profile;

        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        return response()->json($profile);
    }
}
