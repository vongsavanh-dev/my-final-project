<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class YearRequest extends FormRequest
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

    public function messages()
    {
        return [

            'year_name.required' => 'ກະລຸນາປ້ອນຊື່ປີຮຽນ',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'year_name' => 'required|unique:years',
        ];
    }
}
