<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
//        $rules = [];
//        $files = count($this->input('files'));
//        foreach (range(0, $files) as $index) {
//            $rules['files.' . $index] = 'required|max:4000';
//        }
//
//        return $rules;
    }
}
