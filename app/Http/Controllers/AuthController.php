<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginPostRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * ログインフォーム表示
     */
    public function index()
    {
        return view('test.index'); 
    }

    /**
     * ログイン処理
     */
    public function login(LoginPostRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('task.list'));
        }

        return back()->withErrors(['email' => 'ログイン情報が正しくありません']);
    }

    /**
     * ログアウト処理
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken();
        $request->session()->regenerate();
        return redirect(route('front.index'));
    }
}