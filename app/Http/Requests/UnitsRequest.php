<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitsRequest extends FormRequest
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

        //adjust uniques attruibte in update.
        return [
            'code'=>'required|unique:units',
            'model_id'=>'required',
            'unit_account_code'=>'required|unique:units',
            'electricity_meter_number'=>'required|unique:units',            
        ];
    }


    public function messages()
    {
        return [
                'code.required'=>'برجاء إدخال كود الوحدة',
                'code.unique'=>'برجاء أختيار كود آخر للوحدة هذا الكود تم أختياره من قبل',
                'model_id.required'=>'برجاء أختيار نوع نموذج الوحدة',
                'unit_account_code.required'=>'برجاء إدخال كود حساب الوحدة',
                'unit_account_code.unique'=>'برجاء أختيار كود حساب الوحدة آخر هذا الكود تم أختياره من قبل',
                'electricity_meter_number.required'=>'برجاء إدخال رقم عداد الكهرباء الخاص بالوحدة',
                'electricity_meter_number.unique'=>'برجاء أختيار رقم عداد الكهرباء آخر للوحدة هذا الرقم تم أختياره من قبل',
                ];
    }
}
