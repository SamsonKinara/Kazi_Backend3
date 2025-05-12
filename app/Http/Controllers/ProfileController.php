<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;

class ProfileController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'location' => 'nullable|string|max:255',
            'skills' => 'nullable|string',
            'bio' => 'nullable|string',
        ]);

        $profile = UserProfile::updateOrCreate(
            ['user_id' => $validated['user_id']],
            [
                'location' => $validated['location'],
                'skills' => $validated['skills'],
                'bio' => $validated['bio'],
            ]
        );

        return response()->json([
            'message' => 'Profile setup complete.',
            'profile' => $profile,
        ], 200);
    }
}
