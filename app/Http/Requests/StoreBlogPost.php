<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required'
        ];
    }

    /**
     * 错误信息
     * @return array
     */
    public function messages(){
        return [
            'title.required' => '标题不能为空',
            'title.max' => '标题不得少于255个字符',
            'content.required' => '内容不能为空',
        ];
    }
}
