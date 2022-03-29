<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Models\User;
use App\Services\OTPService;

use Auth;

class AuthController extends Controller
{
    protected $otpService;

    public function __construct(OTPService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function userAuthenticate(Request $request) : JsonResponse
    {
        try
        {
            $credentials = $request->only('email', 'password');

            if (!Auth::attempt($credentials))
            {
                return response()->json('Invalid credentials provided', 401);
            }

            $user = Auth::user();
            $authToken = $user->createToken(time().$user->id.'authtoken')->plainTextToken;

            $authenticationData = [
                'user' => $user,
                'authToken' => $authToken
            ];

            return response()->json($authenticationData, 200);
        }
        catch (Exception $e)
        {
            return response()->json($e->getMessage(), 500);
        }
    }

    // TODO: Create email template for user verification OTP
    public function userVerify(Request $request) : JsonResponse
    {
        try
        {
            $user = User::whereEmail($request->email)->first();
            $otp = $this->otpService->generateOtp($user->id);

            $verification_data = [
                'verification_mail' => 'sent'
            ];

            return response()->json($verification_data, 200);
        } catch (Exception $e)
        {
            throw response()->json($e->getMessage(), 500);
        }
    }

    public function userVerifyOtp(Request $request) : JsonResponse
    {
        //
    }

    // TODO: Reset user password
    public function userResetPassword(Request $request) : JsonResponse
    {
        //
    }
}
