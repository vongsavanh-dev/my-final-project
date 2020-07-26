<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'register_name.required' => 'ປ້ອນຊື່',
            'register_surname.required' => 'ປ້ອນນາມສະກຸນ',
            'register_gender.required' => 'ປ້ອນເພດ',
            'register_phone.required' => 'ປ້ອນເບີໂທ',
            'register_village.required' => 'ປ້ອນບ້ານ',
            'register_city.required' => 'ປ້ອນເມືອງ',
            'register_province.required' => 'ປ້ອນແຂວງ',
            'register_dob.required' => 'ປ້ອນວັນເດືອນປີເກີດ',
            'register_religion.required' => 'ປ້ອນສາສະໜາ',
            'father_name.required' => 'ປ້ອນຊື່ພໍ່',
            'mother_name.required' => 'ປ້ອນຊື່ແມ່',
            'father_phone.required' => 'ປ້ອນເບີໂທ',
            'mother_phone.required' => 'ປ້ອນເບີໂທ',
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
            'register_name' => 'required',
            'register_surname' => 'required',
            'register_gender' => 'required',
            'register_phone' => 'required|numeric',
            'register_village' => 'required',
            'register_city' => 'required',
            'register_province' => 'required',
            'register_dob' => 'required',
            'register_religion' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'father_phone' => 'required|numeric',
            'mother_phone' => 'required|numeric',
            'major_id' => 'required',
            'session_id' => 'required',

        ];
    }
}
