<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnteryStickersForCarsRequest extends FormRequest
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
            'code'=>'required|unique:entry_stickers_for_cars,code,'.$this->entry_stickers_for_car,
            'owner_id'=>'required',
            'car_owner'=>'required',
            'release_date'=>'required',
            'plate_number'=>'required|unique:entry_stickers_for_cars,plate_number,'.$this->entry_stickers_for_car,
            'the_manufacture_company'=>'required',
            'status'=>'required',
        ];
    }



    public function messages()
    {
        return  [
                    'code.required'=>'برجاء إدخال كود الملصق الخاص بالسيارة ',
                    'code.unique'=>' كود الملصق الخاص بالسيارة تم إدخاله من قبل برجاء أختيار كود آخر',
                    'owner_id.required'=>'برجاء أختيار اسم مالك الوحدة',
                    'car_owner.required'=>'برجاء إدخال اسم المالك الفعلي للسيارة',
                    'release_date.required'=>'برجاء أختيار تاريخ الإصدار للملصق',
                    'plate_number.required'=>'برجاء إدخال رقم لوحة السيارة',
                    'plate_number.unique'=>'الرقم لوحة السيارة تم إدخاله من قبل برجاء أختيار رقم آخر',
                    'the_manufacture_company.required'=>'برجاء إدخال اسم الشركة المصنعة للسيارة',
                    'status.required'=>'برجاء اختيار السماح بدخول أو عدم دخول السيارة',
                ];
    }
}
