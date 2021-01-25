<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class subcategoriesRequest extends FormRequest
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
            'slug' => 'required|unique:categories,slug,' . $this->id,
            'parent_id' => 'required',
            'name' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'required' => ' هذا الحقل مطلوب'
        ];
    }
}
