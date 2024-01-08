<?php

namespace App\Http\Controllers;

use App\Services\Auth\AuthLoginService;
use App\Services\Auth\AuthLogoutService;
use App\Services\Auth\AuthRegistrationService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $authLoginService;
    protected $authLogoutService;
    protected $authRegistrationService;
    public function __construct(
        AuthRegistrationService $authRegistrationService,
        AuthLoginService $authLoginService,
        AuthLogoutService $authLogoutService)
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
    public function logout(Request $request){
        return $this->authLogoutService->logout($request);
    }
}
