<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminProfileRequest extends FormRequest
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

    public function rules()
    {
        return [
            'email' => 'email|required|unique:admins,email,'.$this->id,
            'name' => 'required',
            'password'=>'nullable|confirmed|min:8'
        ];
    }

    public function messages()
    {
        return [
            'Required' => 'The Field Is Required ' ,
            'email.email'=>'It Mus Be An Email' ,
            'email.unique'=>'It Mus Be Unique'

        ];
    }
}
