<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class UsersController extends Controller
{
    public function store(UserRequest $request)
    {
        $verifyData=Cache::get($request->verification_key);
        //获取缓存数据
        if(!$verifyData){
            return $this->response->error('验证码已失效',422);
        }
        //验证码判断
        if(!hash_equals($verifyData['code'],$request->verification_code)){
            return $this->response->errorUnauthorized('验证码错误');
        }
        $user=User::create([
            'name' => $request->name,
            'phone'=>$verifyData['phone'],
            'password'=>bcrypt($request->password)
        ]);
        // 清除验证码缓存
        Cache::forget($request->verification_key);
        return $this->response->created();
    }
}
