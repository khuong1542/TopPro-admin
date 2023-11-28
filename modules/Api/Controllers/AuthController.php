<?php

namespace Modules\Api\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Api\Services\AuthService;

class AuthController extends Controller
{
    private $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }
    public function register(Request $request)
    {
        $data = $this->authService->register($request->all());
        if(isset($data['status']) && $data['status'] === false){
            return response()->json(['status' => false, 'message' => $data['message']]);
        }
        return response()->json(['status' => 200, 'data' => $data]);
    }
    public function login(Request $request)
    {
        $data = $this->authService->login($request->all());
        return response()->json(['status' => 200, 'data' => $data]);
    }
}