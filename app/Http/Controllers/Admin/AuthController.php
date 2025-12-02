<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Http\Requests\AdminLoginPostRequest;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;


class AuthController extends Controller
{

    /**
     * トップページ を表示する
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // ★修正点1: view('admin.index') に修正
        return view('admin.index'); 
    }

    /**
     * ログイン処理
     * 
     */
    public function login(AdminLoginPostRequest $request)
    {
        // validate済

        // データの取得
        $datum = $request->validated();
        //var_dump($datum); exit;

        // 認証
        if (Auth::guard('admin')->attempt($datum) === false) {
            return back()
                   ->withInput() // 入力値の保持
                   ->withErrors(['auth' => 'ログインIDかパスワードに誤りがあります。',]) // エラーメッセージの出力
                   ;
        }

        $request->session()->regenerate();
        return redirect()->intended('/admin/top');
    } 
    
    /**
     * ログアウト処理
     * 
     */
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->regenerateToken();  // CSRFトークンの再生成
        $request->session()->regenerate();  // セッションIDの再生成
        return redirect(route('admin.index'));
    }

}