<?php



declare(strict_types=1);

namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Http\Requests\LoginPostRequest;

use Illuminate\Support\Facades\Auth;



class AuthController extends Controller

{

    /**

     * トップページ を表示する

     *

     * @return \Illuminate\View\View

     */

    public function index()

    {

        return view('index');

    }



    /**

     * ログイン処理

     *

     */

    public function login(LoginPostRequest $request)

    {

        // validate済



        // データの取得

        $datum = $request->validated();



        //

        // var_dump($datum); exit;

       



        // 認証に失敗した場合

        if (Auth::attempt($datum) === false) {

            return back()

                   ->withInput() // 入力値の保持

                   ->withErrors(['auth' => 'emailかパスワードに誤りがあります。',]) // エラーメッセージの出力

                   ;

        }



        // 認証に成功した場合

        $request->session()->regenerate();

        return redirect()->intended('/task/list');

    }
    
        /**
     * ログアウト処理
     * 
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->regenerateToken();  // CSRFトークンの再生成
        $request->session()->regenerate();  // セッションIDの再生成
        return redirect(route('front.index'));
    } 

}