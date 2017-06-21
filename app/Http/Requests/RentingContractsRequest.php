<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentingContractsRequest extends FormRequest
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
        return  [
                    'renter_id'=>'required',
                    'unit_id'=>'required',
                    'soft_copy'=>'mimes:pdf',            
                ];
    }


    public function messages()
    {
        return  [
                    'renter_id.required'=>'برجاء أختيار اسم المستأجر', 
                    'unit_id.required'=>'برجاء ختيار كود الوحدة',
                    'soft_copy.mimes'=>'pdf برجاء أختيار ملف مناسب لصورة العقد من أمتداد',
                ];
    }
}
