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


        $rules =  [
            'code'=>"required|unique:units,code,".$this->unit,
            'model_id'=>'required',
            'unit_account_code'=>"required|unique:units,unit_account_code,".$this->unit,
            'electricity_meter_number'=>"required|unique:units,electricity_meter_number,".$this->unit,
            'unit_expenses'=>'numeric|nullable',
            'garden_maintenance_expenses'=>'numeric|nullable',
            'staff_housing_expenses'=>'numeric|nullable',
            'debt_benefits'=>'numeric|nullable',
            'balances_of_previous_years'=>'numeric|nullable',
            
        ];
        
        for($i = 0 ; $i<= count($this->images) ; $i++){
            $rules['images.'.$i] = 'image';
        }

        return $rules;
    }


    public function messages()
    {
            $messages = [
                'code.required'=>'برجاء إدخال كود الوحدة',
                'code.unique'=>'برجاء أختيار كود آخر للوحدة هذا الكود تم أختياره من قبل',
                'model_id.required'=>'برجاء أختيار نوع نموذج الوحدة',
                'unit_account_code.required'=>'برجاء إدخال كود حساب الوحدة',
                'unit_account_code.unique'=>'برجاء أختيار كود حساب الوحدة آخر هذا الكود تم أختياره من قبل',
                'electricity_meter_number.required'=>'برجاء إدخال رقم عداد الكهرباء الخاص بالوحدة',
                'electricity_meter_number.unique'=>'برجاء أختيار رقم عداد الكهرباء آخر للوحدة هذا الرقم تم أختياره من قبل',
                'images.0.image'=>'صورة للوحدة يجب أن تكون صورة ليس اى ملف آخر',
                'unit_expenses.numeric'=>'برجاء إدخال أرقام فقط فى حقل مصاريف الوحدة',
                'garden_maintenance_expenses.numeric'=>'برجاء إدخال أرقام فقط فى حقل مصاريف صيانة الحدائق',
                'staff_housing_expenses.numeric'=>'برجاء إدخال أرقام فقط فى حقل مصاريف سكن العاملين',
                'debt_benefits.numeric'=>'برجاء إدخال أرقام فقط فى حقل فوائد الدين',
                'balances_of_previous_years.numeric'=>'برجاء إدخال أرقام فقط فى حقل أرصدة سنوات آخرى',
                ];

       
            return $messages;
    }
}
