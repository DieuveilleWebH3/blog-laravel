<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => 'required|string|min:3',
            'extrait' => 'required|string|min:25',
            'description' => 'required|string|min:100',
            'picture' => 'required|image',
            'category_list' => 'required',
            // 'user_id' => 'nullable'
        ];
    }
}
