<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OwnersRequest extends FormRequest
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
            'name'=>'required|unique:owners',
            'mobile_1'=>'required|numeric',

            'mobile_2'=>'numeric|nullable',
            'telephone'=>'numeric|nullable',
            'email'=>'email|nullable',
            'work_email'=>'email|nullable',
            'contact_person_phone'=>'numeric|nullable',
           
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'برجاء إدخال اسم للمالك',
            'name'=>'required|unique:owners',

        ];
    }
}
