<?php

namespace App\Http\Controllers;

use App\Http\Requests\PasswordUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {

        return response([
            'status' => 200,
            'user' => auth()->user()
        ]);
    }

    public function password_update(PasswordUpdateRequest $request)
    {

        $user = auth()->user();

        if (Hash::check($request->old, $user->password)) {
            $user->fill([
                'password' => Hash::make($request->new)
            ])->save();

            return response([
                'status' => 200,
                'message' => 'Password changed'
            ]);
        }

        return response([
            'status' => 422,
            'errors' => [
                'old' => ['Old Password does not match']
            ]
        ], 422);
    }

    public function personal_info(Request $request)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name
        ]);

        return response([
            'message' => "user updated successfully",
            'user' => $user            
        ], 200);
    }
}
