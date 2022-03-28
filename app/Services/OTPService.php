<?php

namespace App\Services;

use App\Models\UserOtp;

use Str;

class OTPService
{

    public function generateOtp($userId)
    {
        try
        {
            $otp = strtoupper(Str::random(6));

            UserOtp::create([
                'user_id' => $userId,
                'otp' => $otp
            ]);

            return $otp;
        }
        catch (Exception $e)
        {
            throw $e->getMessage();
        }

    }

    public function verifyOtp($userId, $otp)
    {

    }
}
