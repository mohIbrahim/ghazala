<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MembershipCardsForIndividualsRequest extends FormRequest
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
            'serial'=>'required|unique:membership_cards_for_individuals,serial,'.$this->membership_cards_for_individual,
            'owner_id'=>'required',
            'unit_id'=>'required',
            'type'=>'required',
            'release_date'=>'required',
            'status'=>'required',
        ];
    }


    public function messages()
    {
        return  [
                    'serial.required'=>'برجاء إدخال الكود الخاص بالكارت',
                    'serial.unique'=>'برجاء أختيار كود آخر الخاص بالكارت لان هذا الكود تم إدخالة من قبل',
                    'owner_id.required'=>'برجاء أختيار اسم مالك الوحدة',
                    'unit_id.required'=>'برجاء أختيار كود الوحدة',
                    'release_date.required'=>'برجاء أختيار تاريخ الاصدار',
                    'type.required'=>'برجاء أختيار نوع الكارت',
                    'status.required'=>'برجاء أختيار حالة الكارت من حيث حالة التفعيله',
                ];  
    }
}
