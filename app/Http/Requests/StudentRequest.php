<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'st_name.required' => 'ປ້ອນຊື່',
            'st_surname.required' => 'ປ້ອນນາມສະກຸນ',
            'st_gender.required' => 'ປ້ອນເພດ',
            'st_phone.required' => 'ປ້ອນເບີໂທ',
            'st_village.required' => 'ປ້ອນບ້ານ',
            'st_city.required' => 'ປ້ອນເມືອງ',
            'st_province.required' => 'ປ້ອນແຂວງ',
            'st_dob.required' => 'ປ້ອນວັນເດືອນປີເກີດ',
            'st_religion.required' => 'ປ້ອນສາສະໜາ',
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
            'st_name' => 'required',
            'st_surname' => 'required|string',
            'st_gender' => 'required',
            'st_phone' => 'required|numeric',
            'st_village' => 'required',
            'st_city' => 'required',
            'st_province' => 'required',
            'st_dob' => 'required',
            'st_religion' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'father_phone' => 'required|numeric',
            'mother_phone' => 'required|numeric',
            'major_id' => 'required',
            'session_id' => 'required',
        ];
    }
}
