<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class domain extends Controller
{

    public function login(Request $request)
    {
        if (Auth::check()){
            $user = Auth::user();
            return response()->json($user->toArray());
        }else {
            if (Auth::attempt(['email' => $request->input("email"), 'password' => $request->input('password')])) {
                $user = Auth::user();
                // 认证通过...
                return "欢迎".$user->name."1登入";
            } else {
                return "error";
            }
        }
    }

    //post 请求
    public function login_post(Request $request)
    {
        if (Auth::check()){
            $user = Auth::user();
            return response()->json($user->toArray());
        }else {
            if (Auth::attempt(['email' => $request->input("email"), 'password' => $request->input('password')])) {
                $user = Auth::user();
                // 认证通过...
                return "欢迎".$user->name."1登入";
            } else {
                return "error";
            }
       }
    }

    public function logout(Request $request)
    {
        if (Auth::check()){
            Auth::logout();
            return response("退出成功");
        }
    }

    //返回api 测试数据
    public function api_test()
    {
        return response("jk")->cookie("XSRF-TOKEN");
    }





}
