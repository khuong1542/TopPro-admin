<?php

namespace Modules\Api\Services;

use Illuminate\Support\Facades\Hash;
use Modules\Api\Repositories\UserRepository;
use Modules\Core\BaseService;

class AuthService
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function repository()
    {
        return UserRepository::class;
    }
    /**
     * Đăng ký
     * @return array
     */
    public function register($input)
    {
        if($this->userService->where('username', $input['username'])->exists()){
            return array('status' => false, 'message' => 'Tên đăng nhập đã tồn tại');
        }elseif($this->userService->where('email', $input['email'])->exists()){
            return array('status' => false, 'message' => 'Email đã tồn tại');
        }
        $data = $this->userService->_update($input);
        return $data;
    }
    /**
     * Đăng nhập
     * @return array
     */
    public function login($input): array
    {
        $users = $this->userService->where('email', $input['username'])->orWhere('username', $input['username'])->first();
        if(!empty($users)){
            if(Hash::check($input['password'], $users->password)){
                $data['users'] = $users;
                $data['users']['token'] = $users->createToken('authToken')->plainTextToken;
                return array('status' => true, 'message' => 'Đăng nhập thành công.', 'data' => $data);
            }else{
                return array('status' => false, 'message' => 'Mật khẩu không đúng!');
            }
        }else{
            return array('status' => false, 'message' => 'Tên đăng nhập hoặc email không đúng!');
        }
    }
    /**
     * Đăng xuất
     * @return array
     */
    public function logout(): array
    {
        if(auth('sanctum')->user()){
            auth('sanctum')->user()->currentAccessToken()->delete();
        }
        auth()->guard('web')->logout();
        return array('status' => true, 'message' => 'Đăng xuất thành công.');
    }
}