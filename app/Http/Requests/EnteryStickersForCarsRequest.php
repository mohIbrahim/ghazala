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
            'code'=>'required|unique',
            'car_owner'=>'required',
            'release_date'=>'required',
            'plate_number'=>'required|unique',
            'the_manufacture_company'=>'required',
            'owner_id'=>'required',
        ];
    }
}
