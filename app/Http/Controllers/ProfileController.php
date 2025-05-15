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
            'bio' => 'required|string',
            'phone' => 'required|string',
            'location' => 'required|string',
            'profile_picture' => 'required|url',
        ]);

        $user = Auth::user();

        $profile = Profile::updateOrCreate(
            ['user_id' => $user->id],
            [
                'bio' => $request->bio,
                'phone' => $request->phone,
                'location' => $request->location,
                'profile_picture' => $request->profile_picture,
            ]
        );

        return response()->json(['message' => 'Profile updated successfully', 'profile' => $profile], 200);
    }

    public function show()
    {
        $user = Auth::user();
        $profile = Profile::where('user_id', $user->id)->first();

        if (!$profile) {
            return response()->json(['message' => 'Profile not found'], 404);
        }

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'bio' => $profile->bio,
            'phone' => $profile->phone,
            'location' => $profile->location,
            'profile_picture' => $profile->profile_picture,
        ]);
    }
}
