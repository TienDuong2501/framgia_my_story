<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostTable extends FormRequest
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
            'title' => 'required|min:6|max:255|unique:posts,title',
            'sumary' => 'required|min:30',
            'image' => 'required',
            'body' => 'required|min:100',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => ':attribute can not be null',
            'title.min' => ':attribute can not be lower than 6 characters',
            'title.max' => ':attribute can not be greater than 255 characters',
            'title.unique' => ':attribute is already exist',
            'sumary.required' => ':attribute is required',
            'sumary.min' => ':attribute can not be lower than 30 characters',
            'image.required' => ':attribute is required',
            'body.required' => ':attribute is required',
            'body.min' => ':attribute is can not be lower than 100 characters',
        ];
    }
}
