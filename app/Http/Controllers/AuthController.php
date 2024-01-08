<?php

namespace App\Http\Controllers;

use App\Services\Auth\AuthLoginService;
use App\Services\Auth\AuthRegistrationService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authLoginService;
    protected $authRegistrationService;
    public function __construct(
        AuthRegistrationService $authRegistrationService,
        AuthLoginService $authLoginService)
    {
        $this->authLoginService=$authLoginService;
        $this->authRegistrationService=$authRegistrationService;
    }
    public function RegisterUser(Request $request){
        return $this->authRegistrationService->RegisterUser($request->all());
    }

    public function login(Request $request){
        return $this->authLoginService->login($request->only(['email','password']));
    }
}
