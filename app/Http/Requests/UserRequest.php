<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $id = $this->route()->parameter('user');
        
        return [
            'new_password'=>'confirmed',
            'email'=>'required|email|unique:users,email,'.$id,
            'current_password'=>'required',
            'personal_image'=>'mimes:jpg,jpeg,png',
        ];
    }



}