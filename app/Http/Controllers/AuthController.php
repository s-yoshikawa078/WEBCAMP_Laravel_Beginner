<?php

declare(strict_types=1);

namespace App\Http\Controllers; // ★ Adminがないことを確認

use Illuminate\Http\Request;
use App\Http\Requests\LoginPostRequest; // ★ 必ずフロントエンド用のリクエストを使用
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller; 


class AuthController extends Controller
{
    /**
     * トップページ（ログインフォーム）を表示する
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // ★ ユーザー側のビュー名に戻す
        return view('front.index'); 
    }

    /**
     * ログイン処理
     */
    public function login(LoginPostRequest $request) 
    {
        // ユーザー認証ロジックを記述する場所
        // ...
        
        // 成功後のリダイレクト先をユーザー画面に戻す
        // return redirect()->intended('/task/list');
    }
    
    /**
     * ログアウト処理
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken(); 
        $request->session()->regenerate();
        // ログアウト後のリダイレクト先をユーザー側に戻す
        return redirect(route('front.index'));
    }
}