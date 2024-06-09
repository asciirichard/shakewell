<?php

namespace App\Http\Controllers;

use App\Mail\SendWelcomeEmail;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{

    /**
     * Registers a new user
     * @param Request $request
     * @return JsonResponse
     */
    public function registerUser(Request $request): JsonResponse
    {

        $request->validate([
           'first_name' => 'required',
           'username' => 'required|unique:users,username',
           'email' => 'required|unique:users,email',
           'password' => 'required',
        ]);

        $email = $request->input('email');

        $user = User::create([
            'first_name' => $request->input('first_name'),
            'username' => $request->input('username'),
            'email' => $email,
            'password' => bcrypt($request->input('password'))
        ]);

        $voucher = (new Voucher())->createVoucherByUserId($user->id);
        Mail::to($email)->send(new SendWelcomeEmail($voucher));

        return response()->json(['user' => $user]);

    }

    /**
     * Generate a token if the user is authenticated
     * @param Request $request
     * @return JsonResponse
     */
    public function authenticateUser(Request $request): JsonResponse
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $token = $request->user()->createToken($request->input('username'));
            return response()->json(['auth_token' => $token->plainTextToken]);
        }

        return response()->json(['error' => 'Incorrect credentials'], 401);
    }

    /**
     * Logout user by deleting tokens
     * @param Request $request
     * @return JsonResponse
     */
    public function logoutUser(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out.']);
    }
}
