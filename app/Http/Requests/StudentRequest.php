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
            'st_tel.required' => 'ປ້ອນເບີໂທ',
            'st_village.required' => 'ປ້ອນບ້ານ',
            'st_city.required' => 'ປ້ອນເມືອງ',
            'st_province.required' => 'ປ້ອນແຂວງ',
            'st_dob.required' => 'ປ້ອນວັນເດືອນປີເກີດ',
            'religion.required' => 'ປ້ອນສາສະໜາ',
            'parent_name.required' => 'ປ້ອນຂໍ້ມູນຜູ້ປົກຄອງ',
            'parent_tel.required' => 'ປ້ອນຂໍ້ມູນເບີໂທຜູ້ປົກຄອງ',
            'session_name.required' => 'ປ້ອນຂໍ້ມູນພາກຮຽນ',
            'major_id.required' => 'ປ້ອນຂໍ້ມູນສາຂາຮຽນ',
            'academic_id' => 'ປ້ອນຂໍ້ມຸນສົກຮຽນ'
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
            'st_tel' => 'required|numeric',
            'st_village' => 'required',
            'st_city' => 'required',
            'st_province' => 'required',
            'st_dob' => 'required',
            'religion' => 'required',
            'parent_name' => 'required',
            'parent_tel' => 'required',
            'academic_id' => 'required',
            'major_id' => 'required',
            'session_name' => 'required',
        ];
    }
}
