<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
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

    public function messages()
    {
        return [
            'name.required' => 'ກະລຸນາປ້ອນຊື່',
            'surname.required' => 'ກະລຸນາປ້ອນນາມສະກຸນ',
            'gender.required' => 'ກະລຸນາປ້ອນເພດ',
            'phone.required' => 'ກະລຸນາປ້ອນເບີໂທລະສັບ',
            'email.required' => 'ກະລຸນາປ້ອນອີເມວ',
            'village.required' => 'ກະລຸນາປ້ອນຊື່ບ້ານ',
            'provinces.required' => 'ກະລຸນາປ້ອນຊື່ແຂວງ',
            'district.required' => 'ກະລຸນາປ້ອນຊື່ເມືອງ',
            'education.required' => 'ກະລຸນາປ້ອນປະຫວັດການສຶກສາ',
            'image.required' => 'ກະລຸນາເລືອກຮູບພາບ',


        ];
    }
    public function rules()
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'village' => 'required',
            'provinces' => 'required',
            'district' => 'required',
            'education' => 'required',
            'image' => 'required|image'
        ];
    }
}
