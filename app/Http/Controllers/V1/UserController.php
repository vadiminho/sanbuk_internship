<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\User\SignUpRequest;
use App\Services\UserService;
use Knuckles\Scribe\Attributes\Endpoint;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\Subgroup;

#[Group('User')]
class UserController extends Controller
{
    public function __construct(private UserService $userService)
    {
    }

    #[Subgroup('Auth')]
    #[Endpoint('Sign Up')]
    public function signUp(SignUpRequest $request)
    {
        return $this->userService->createRecord($request->validated());
    }
}
