<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function show()
    {
        return view('auth.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        // Task: fill in the code here to update name and email
        // Also, update the password if it is set
		$user = User::where('email', $request->email)->get();
		
		$user->email = $request->email;
		$user->name = $request->name;
		if ($request->password != null)
		{
			$user->password = $request->password;
		}
		$user->save();

        return redirect()->route('profile.show')->with('success', 'Profile updated.');
    }
}
