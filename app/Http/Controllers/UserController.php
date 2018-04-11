<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //个人中心展示页
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    //编辑资料

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    //更新资料
    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.show', $user->id)->with('success', '更新资料成功');

    }
}
