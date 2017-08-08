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
                    'name'=>'required|unique:employees,name,'.$this->employee,
                    'jobs'=>'required',
                    'phone'=>'required|numeric',
                ];
    }


    public function messages()
    {
        return  [
                    'name.required'=>'برجاء إدخال اسم الموظف',
                    'name.unique'=>'اسم الموظف تم إدخالة من قبل برجاء اختيار اسم آخر',
                    'jobs.required'=>'برجاء أختيار الوظيفة',
                    'phone.required'=>'برجاء إدخال رقم تليفون الوظف',
                    'phone.numeric'=>'برجاء إدخال رقم تليفون الموظف ارقام فقط',

                ];
    }
}
