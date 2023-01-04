<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BedValidationRequest extends FormRequest
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
            'room_id' => 'required',
            'bed_name' => 'string | required',
            'bed_charge' => "required"
        ];
    }

    /**customer message */
    public function messages()
    {
        return [
            'room_id.required' => 'Select room is required',
            'bed_name.required' => 'Bed name is required',
            'bed_charge.required' => 'Select bed charge is required',
        ];
    }
}
