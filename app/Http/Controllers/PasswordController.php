<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Controller purely for updating user passwords.
 */
class PasswordController extends Controller
{
    public function update(Request $request)
    {
        // try to get an authenticated user
        $user = $request->user();

        // if not, get their id from the uri
        if (!$user) {
            $id = $request->route('id');
            $user = User::find($id);
        }

        $isDuplicatePassword = Hash::check($request->password, $user->password);
        if ($isDuplicatePassword) {
            return response()->json(['error' => 'New password cannot be the same as the old one.'], 422);
        }

        $user->update(["password" => Hash::make($request->password)]);
        return response()->json(["message" => "Password updated successfully."]);
    }
}
