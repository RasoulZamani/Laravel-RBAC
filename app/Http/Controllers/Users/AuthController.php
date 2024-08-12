<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // login 
    public function login(ApiLoginRequest $request):JsonResponse {
        $request->validated($request->all());

        if (!Auth::attempt($request->only('phone','password'))) {
            return $this->error($message="Invalid credentials", $statusCode=401);
        }

        $user = User::where('email',$request->email)->first();

        return $this->ok($message="Authenticated", $data=[
            'token' => $user->createToken(
                'API token for' . $user->email,
                Ability::getAbilities($user), 
                now()->addMonth()
                )->plainTextToken
        ]);
        
    }

    // Log out
    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return $this->ok("You logged out! See you soon:)");
    }

    // Register
    public function register(ApiLoginRequest $request):JsonResponse {
        return $this->ok("$request->email was registered.");
    }
}
