<?php

namespace App\Http\Requests;

class ReplyRequest extends Request
{

        public function rules()
    {
        return [
            'contents' => 'required|min:2',
        ];
    }



    public function messages()
    {
        return [
            // Validation messages
            'contents.required'=>'最少输入两字符'
        ];
    }
}
