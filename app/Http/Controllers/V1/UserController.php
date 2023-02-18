<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\SignInRequest;
use App\Http\Requests\V1\User\SignUpRequest;
use App\Http\Requests\V1\User\VerificationRequest;
use App\Models\User;
use App\Services\TwilioService;
use App\Services\UserService;
use Knuckles\Scribe\Attributes\Authenticated;
use Knuckles\Scribe\Attributes\Endpoint;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\Subgroup;
use Twilio\Exceptions\RestException;

#[Group('User')]
class UserController extends Controller
{
    public function __construct(private UserService $userService, private TwilioService $twilioService)
    {
    }

    #[Subgroup('Auth')]
    #[Endpoint('Sign Up')]
    public function signUp(SignUpRequest $request)
    {
        return $this->userService->createRecord($request->validated());
    }

    #[Subgroup('Auth')]
    #[Endpoint('Sign In')]
    public function signIn(SignInRequest $request)
    {
        return $this->twilioService->sendVerifyCode($request->post('phone'));
    }

    #[Subgroup('Auth')]
    #[Endpoint('SMS Verification')]
    public function verification(VerificationRequest $request)
    {
        try {
            $twilioStatus = $this->twilioService->validateVerificationCode($request->post('phone'), $request->post('code'));
            $result = $this->userService->phoneVerification($twilioStatus, $request->post('phone'));

            if ($result === false) {
                return [
                    'result' => false,
                ];
            }

            return $result;
        } catch (RestException $exception) {
            return [
                'result' => false,
            ];
        }
    }

    #[Subgroup('Profile')]
    #[Authenticated]
    #[Endpoint('Get profile')]
    public function profile()
    {
        return auth()->user();
    }
}
