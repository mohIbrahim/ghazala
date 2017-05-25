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
            "name"=>"required",
            "type"=>"required",
            "total_area"=>"integer",
            "net_area"=>"integer",
            "number_of_rooms"=>"integer",
            "number_of_floors"=>"integer",
            "number_of_toilets"=>"integer",
            "number_of_balconies"=>"integer",
            "number_of_kitchens"=>"integer",
        ];
    }


    public function messages()
    {
        return[
            "name.required"=>"برجاء إدخال قيمة فى حقل اسم النموذج",
            "type.required"=>"برجاء أختيار قيمة لنوع النموذج",
            "total_area.integer"=>"برجاء إدخال قيمة عددية صحيحة للمساحة الكلية للنموذج",
            "net_area.integer"=>"برجاء إدخال قيمة عددية صحيحة للمساحة الصافية للنموذج",
            "number_of_rooms.integer"=>"برجاء إدخال قيمة عددية صحيحة لعدد الغرف بالنموذج",
            "number_of_floors.integer"=>"برجاء إدخال قيمة عددية صحيحة لعدد الطوابق بالنموذج",
            "number_of_toilets.integer"=>"برجاء إدخال قيمة عددية صحيحة لعدد دورات المياة بالنموذج",
            "number_of_balconies.integer"=>"برجاء إدخال قيمة عددية صحيحة لعدد الشُرُفات بالنموذج",
            "number_of_kitchens.integer"=>"برجاء إدخال قيمة عددية صحيحة لعدد المطابخ بالنموذج",
        ];
    }
}
