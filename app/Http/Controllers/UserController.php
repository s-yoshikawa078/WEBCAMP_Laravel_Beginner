<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRegisterPost;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 登録画面表示
    public function index()
{
    return view('user.register'); 
}


    // 登録処理
    public function register(UserRegisterPost $request)
    {
        $datum = $request->validated();

        // パスワードをハッシュ化
        $datum['password'] = Hash::make($datum['password']);

        // DB登録
        User::create($datum);

        // 登録完了後はトップページへリダイレクト
        return redirect()->route('front.index')->with('status', '登録されました');
    }
}