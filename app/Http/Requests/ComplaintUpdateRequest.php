<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComplaintUpdateRequest extends FormRequest
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
            'body'=>'max:500',
            'place'=>'alpha',
            'district_id'=>'integer',
            'file'=>'mimes:jpeg,jpg,png',
            'priority'=>'in:normal,urgent',
        ];
    }
}
