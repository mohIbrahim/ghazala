<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnersFamilyMembersRequest extends FormRequest
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
            'name'=>'required',
            'owners_ids'=>'required',
        ];
    }


    public function messages()
    {
        return [
            'name.required'=>'برجاء إدخال اسم العضو',         
            'owners_ids.required'=>'برجاء أختيار اسم المالك',         
        ];
    }
}
