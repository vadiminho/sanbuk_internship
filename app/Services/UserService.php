<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function createRecord(array $data)
    {
        return User::create($data);
    }

    public function phoneVerification($status, $phone)
    {
        if ($status === TwilioService::VERIFICATION_STATUS_APPROVED) {
            /** @var User $user */
            $user = User::where('phone', $phone)->firstOrFail();
            return $user->createToken(mt_rand(0, 100))->plainTextToken;
        }

        return false;
    }
}
