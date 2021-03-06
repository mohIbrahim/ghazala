<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UnitModelsRequest extends FormRequest
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
            "name"=>"required|unique:unit_models,name,".$this->unit_model,
            "type"=>"required",
            "total_area"=>"integer|nullable",
            "net_area"=>"integer|nullable",
            "number_of_rooms"=>"integer|nullable",
            "number_of_floors"=>"integer|nullable",
            "number_of_toilets"=>"integer|nullable",
            "number_of_balconies"=>"integer|nullable",
            "number_of_kitchens"=>"integer|nullable",
            "finishing_type"=>"required",
        ];
    }


    public function messages()
    {
        return[
            "name.required"=>"برجاء إدخال قيمة فى حقل اسم النموذج",
            "name.unique"=>"اسم النموذج تم إدخاله من قبل برجاء اختيار اسم آخر",
            "type.required"=>"برجاء أختيار قيمة لنوع النموذج",
            "total_area.integer"=>"برجاء إدخال قيمة عددية صحيحة للمساحة الكلية للنموذج",
            "net_area.integer"=>"برجاء إدخال قيمة عددية صحيحة للمساحة الصافية للنموذج",
            "number_of_rooms.integer"=>"برجاء إدخال قيمة عددية صحيحة لعدد الغرف بالنموذج",
            "number_of_floors.integer"=>"برجاء إدخال قيمة عددية صحيحة لعدد الطوابق بالنموذج",
            "number_of_toilets.integer"=>"برجاء إدخال قيمة عددية صحيحة لعدد دورات المياة بالنموذج",
            "number_of_balconies.integer"=>"برجاء إدخال قيمة عددية صحيحة لعدد الشُرُفات بالنموذج",
            "number_of_kitchens.integer"=>"برجاء إدخال قيمة عددية صحيحة لعدد المطابخ بالنموذج",
            "finishing_type.required"=>"برجاء اختيار قيمة لنوع التشطيب بالنموذج",
        ];
    }
}
