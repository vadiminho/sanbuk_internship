<?php

namespace App\Services;

use Aloha\Twilio\Twilio;

class TwilioService
{
    const VERIFICATION_STATUS_APPROVED = 'approved';

    private Twilio|null $twilio = null;

    public function __construct()
    {
        $accountId = config('twilio.sid');
        $token = config('twilio.token');

        $this->twilio = new Twilio($accountId, $token, '+123123123');
    }

    public function sendVerifyCode($phone)
    {
        $verification = $this->twilio->getTwilio()->verify->v2->services(config('twilio.service_sid'))
            ->verifications
            ->create($phone, "sms");

        return true;
    }

    public function validateVerificationCode($phone, $code)
    {
        $verification = $this->twilio->getTwilio()->verify->v2->services(config('twilio.service_sid'))
            ->verificationChecks
            ->create([
                'to' => $phone,
                'code' => $code,
            ]);

        return $verification->status;
    }
}
