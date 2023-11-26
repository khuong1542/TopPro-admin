<?php

namespace Modules\Api\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Api\Services\UserService;

class RegisterController extends Controller
{
    private $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function register(Request $request)
    {
        $data = $this->userService->register($request->all());
        return response()->json(['status' => 200, 'data' => $data]);
    }
}