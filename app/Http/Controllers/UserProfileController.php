<?php
// app/Http/Controllers/UserProfileController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserProfileController extends Controller
{
    public function setup(Request $request)
    {
        $user = Auth::user(); // Get the currently authenticated user

        // Validate the profile data (e.g., name, job title, etc.)
        $request->validate([
            'name' => 'required|string|max:255',
            'job_title' => 'nullable|string|max:255',
            'bio' => 'nullable|string',
        ]);

        // Update the user's profile data
        $user->name = $request->name;
        $user->job_title = $request->job_title;
        $user->bio = $request->bio;

        // Save the updated user profile
        $user->save();

        // Return response indicating success
        return response()->json([
            'message' => 'Profile setup successful',
            'user' => $user
        ]);
    }
}
