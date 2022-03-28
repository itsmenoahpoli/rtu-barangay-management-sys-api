<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

use App\Models\User;
use App\Services\OTPService;

class AuthController extends Controller
{
    protected $otpService;

    public function __construct(OTPService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function userAuthenticate(Request $request) : JsonResponse
    {

    }

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

    public function userResetPassword(Request $request) : JsonResponse
    {

    }
}
