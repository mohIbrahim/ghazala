<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentersRequest extends FormRequest
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
            'name'=>'required|unique:renters,name,'.$this->renter,
            
            'mobile_1'=>'required|numeric',
            'mobile_2'=>'numeric|nullable',
            'telephone'=>'numeric|nullable',
            'email'=>'email|nullable',
        ];
    }


    public function messages()
    {
        return [
            'name.required'=>'برجاء إدخال اسم المستأجر',
            'name.unique'=>'هذا الاسم تم إدخاله من قبل برجاء أختيار اسم آخر',

            'mobile_1.required'=>'برجاء إدخال رقم التليفون المحمول للخط الأول',
            'mobile_1.numeric'=>'برجاء إدخال رقم التليفون المحمول للخط الأول أرقام فقط',

            'mobile_2.numeric'=>'برجاء إدخال رقم التليفون المحمول للخط الثاني أرقام فقط',
            'telephone.numeric'=>'برجاء إدخال رقم التليفون الارضي أرقام فقط',
            'email.email'=>'برجاء إدخال البريد الالكتروني الشخصي بشكل صحيح',            
        ];
    }
    
}
