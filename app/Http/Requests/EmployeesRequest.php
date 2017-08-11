<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeesRequest extends FormRequest
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
                    'code'=>'required|unique:employees,code,'.$this->employee,
                    'name'=>'required|unique:employees,name,'.$this->employee,
                    'ssn'=>'required|unique:employees,ssn,'.$this->employee,
                    'jobs'=>'required',
                    'phone'=>'required|numeric',
                ];
    }


    public function messages()
    {
        return  [
                    'code.required'=>'برجاء إدخال كود الموظف',
                    'name.required'=>'برجاء إدخال اسم الموظف',
                    'ssn.required'=>'برجاء إدخال رقم بطاقة الموظف',

                    'code.unique'=>'كود الموظف تم إدخالة من قبل برجاء اختيار كود آخر',
                    'name.unique'=>'اسم الموظف تم إدخالة من قبل برجاء اختيار اسم آخر',
                    'ssn.unique'=>'رقم بطاقة الموظف تم إدخالها من قبل برجاء اختيار رقم آخر',

                    'jobs.required'=>'برجاء أختيار الوظيفة',
                    'phone.required'=>'برجاء إدخال رقم تليفون الوظف',
                    'phone.numeric'=>'برجاء إدخال رقم تليفون الموظف ارقام فقط',
                ];
    }
}
