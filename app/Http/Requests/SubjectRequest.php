<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectRequest extends FormRequest
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
            /* 'sub_id.required' => 'ກະລຸນາປ້ອນລະຫັດວິຊາ', */
            'sub_name.required' => 'ກະລຸນາປ້ອນຊື່ວິຊາ',
            'credit.required' => 'ກະລຸນາປ້ອນຈຳນວນໜ່ວຍກິດ',
            'major_id.required' => 'ກະລຸນາເລືອກສາຂາ',
            'credit.required|numeric' => 'ກະລຸນາປ້ອນຈຳນວນໜ່ວຍກິດ',
            'total_price.required|numeric' => 'ກະລະນາປ້ອນລາຄາລວມໜ່ວຍກິດ',
            'year_name.required' => 'ປ້ອນປີຮຽນ'

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
            /*  'sub_id' => 'required', */
            'sub_name' => 'required|unique:subjects',
            'credit' => 'required|numeric',
            'major_id' => 'required',
            'year_name' => 'required',
            'total_price' => 'required|numeric'
        ];
    }
}
