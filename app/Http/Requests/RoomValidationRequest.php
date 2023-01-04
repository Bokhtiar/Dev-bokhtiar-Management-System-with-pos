<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomValidationRequest extends FormRequest
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
            'room_name' => 'string | required | min:3',
            'category_id' => 'required',
        ];
    }

    /**custome validation message */
    public function messages()
    {
        return [
            'room_name.required' => 'Room name required',
            'room_charge.required' => 'Room charge required',
            'category_id.required' => 'Select category required'
        ];
    }
}
