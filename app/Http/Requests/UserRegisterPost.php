<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterPost extends FormRequest
{
    /**
     * 誰でもリクエスト可能
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * バリデーションルール
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:128'],
            'email' => ['required', 'email', 'max:254', 'unique:users,email'],
            'password' => ['required', 'string', 'max:72'],
        ];
    }

    /**
     * エラーメッセージ（任意）
     */
    public function messages(): array
    {
        return [
            'name.required' => '名前は必須です',
            'name.max' => '名前は128文字以内で入力してください',
            'email.required' => 'メールアドレスは必須です',
            'email.email' => '正しいメールアドレス形式で入力してください',
            'email.max' => 'メールアドレスは254文字以内で入力してください',
            'email.unique' => 'このメールアドレスは既に登録されています',
            'password.required' => 'パスワードは必須です',
            'password.max' => 'パスワードは72文字以内で入力してください',
        ];
    }
}