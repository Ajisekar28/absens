<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRec extends FormRequest
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
            'name' => 'required|string|max:255',
            'rfid' => 'required|string|max:255|unique:siswas',
            'kelamin' => 'required|string',
            'class_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama siswa wajib diisi.',
            'rfid.required' => 'RFID siswa wajib diisi.',
            'rfid.unique' => 'RFID siswa tidak boleh sama',
            'kelamin.required' => 'Kelamin siswa wajib diisi.',
            'class_id.required' => 'Kelas siswa wajib dipilih.',
        ];

    }
}
