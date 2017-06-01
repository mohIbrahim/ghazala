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
            'name'=>'required|unique:owners,id,'.$this->owner,
            'mobile_1'=>'required|numeric',

            'date_of_birth'=>'date|nullable',
            'mobile_2'=>'numeric|nullable',
            'telephone'=>'numeric|nullable',
            'email'=>'email|nullable',
            'work_email'=>'email|nullable',
            'contact_person_phone'=>'numeric|nullable',
            'bank_account_number'=>'numeric|nullable',
            'personal_image'=>'image',
            'contract_image'=>'mimes:pdf',
            'contract_date'=>'date|nullable',
            'owner_status'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'برجاء إدخال اسم المالك',
            'name.unique'=>'هذا الاسم تم إدخاله من قبل برجاء أختيار اسم آخر',

            'date_of_birth.date'=>'برجاء إدخال تاريخ الميلاد بشكل صحيح',

            'mobile_1.required'=>'برجاء إدخال رقم التليفون المحمول للخط الأول',
            'mobile_1.numeric'=>'برجاء إدخال رقم التليفون المحمول للخط الأول أرقام فقط',

            'mobile_2.numeric'=>'برجاء إدخال رقم التليفون المحمول للخط الثاني أرقام فقط',
            'telephone.numeric'=>'برجاء إدخال رقم التليفون الارضي أرقام فقط',
            'email.email'=>'برجاء إدخال البريد الالكتروني الشخصي بشكل صحيح',
            'work_email.email'=>'برجاء إدخال البريد الالكتروني الخاص بالعمل بشكل صحيح',
            'contact_person_phone.numeric'=>'برجاء إدخال رقم تليفون الشخص الذي يمكن الاتصال به فى حالة عدم الوصول للمالك أرقام فقط',

            'bank_account_number.numeric'=>'برجاء إدخال رقم الحساب البنكي ارقام فقط',
            
            'personal_image.image'=>'jpg, png, jpeg برجاء أختيار ملف مناسب للصورة الشخصية من أمتداد',

            'contract_image.mimes'=>'pdf برجاء أختيار ملف مناسب لصورة العقد من أمتداد',

            'contract_date.date'=>'برجاء إدخال تاريخ التعاقد بشكل صحيح',
            'owner_status.required'=>'برجاء أختيار وضع المالك',
        ];
    }
}
