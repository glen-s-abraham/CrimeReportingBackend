<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoliceUserUpdateRequest extends FormRequest
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
            'name'=>'max:120',
            'email'=>'unique:users|email',
            'mobile'=>'regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users',
            'station_id'=>'integer',
        ];
    }
}
