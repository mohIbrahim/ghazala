<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobsRequest extends FormRequest
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
            'name'=>'required|unique:jobs,name,'.$this->job,
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'برجاء إدخال اسم الوظيفة',
            'name.unique'=>'اسم الوظيفة تم أختاره من قبل برجاء اختيار اسم آخر',
        ];
    }
}
