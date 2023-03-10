<?php

namespace ModelsPackage\Laravel\User\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use ModelsPackage\Laravel\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validate the input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // Create a new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Generate a new API token for the user
        $token = $user->createToken('API Token')->plainTextToken;

        // Return a response with the token
        return response()->json(['token' => $token], 201);
    }

}
