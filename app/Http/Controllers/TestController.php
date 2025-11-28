<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestPostRequest;

class TestController extends Controller
{
    /**
     * トップページ を表示する
     * 
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('test.index');
    }

    /**
     * 入力を受け取る
     * 
     * @return \Illuminate\View\View
     */
    public function input(TestPostRequest $request)
    {
        // validate済

        // データの取得
        $validatedData = $request->validated();

        // テンプレートにデータを渡す
        return view('test.input', [
            'datum' => $validatedData,
        ]);
    }
}