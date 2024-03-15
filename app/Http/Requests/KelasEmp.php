<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KelasEmp extends FormRequest
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
            'nama' => 'required|string|min:3|max:32',
            'jurusan_id' => 'required',
            'user_id' => 'required|unique:kelas',
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama jurusan wajib diisi.',
            'jurusan_id.required' => 'Jurusan wajib diisi.',
            'user_id.required' => 'Nama Wali wajib diisi.',
            'user_id.unique' => 'Nama Wali sudah digunakan untuk kelas lain.',
        ];
    }
}
