<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplaintsRequest extends FormRequest
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
        return 
            [                     
                "complainant_name"=>'required',
                "unit_id"=>'required',
                "complainant_phone"=>'required|numeric',
                "title"=>'nullable',    
                "subject"=>'required',  
                "details"=>'nullable',  
                "status"=>'nullable',   
                "complaint_section"=>'nullable',    
                "end_date"=>'nullable', 
                "comments"=>'nullable', 
            ];
    }

    public function messages()
    {
        return 
            [
              "complainant_name.required"=>"برجاء إدخال الاسم", 
              "unit_id.required"=>"برجاء إدخال الاسم", 
                "complainant_phone.required"=>"برجاء إدخال رقم التليفون",   
                "complainant_phone.numeric"=>"برجاء إدخال رقم التليفون أرقام فقط",
            ];
    }
}
