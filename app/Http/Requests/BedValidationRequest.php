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
            'bed_name' => 'string | required',
            'room_id' => 'required',
        ];
    }

    /**customer message */
    public function messages()
    {
        return [
            'bed_name.required' => 'Bed name is required',
            'room_id.required' => 'Select Room is required',
        ];
    }
}
