<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'member_name' => 'required|string',
            'gender' => 'required|in:Pria,Wanita',
            // 'code' => 'required|unique:members,code',
            'nis' => 'nullable',
            'nisn' => 'nullable',
            'whatsapp' => 'required',
            'email' => 'nullable|email',
            'birthday' => 'required|date',
            'grade' => 'required|integer',
            'major' => 'required|string',
            'class_code' => 'required|integer',
            'structure' => 'required|in:Anggota,Pengurus',
            'interest' => 'required|string',
        ];
    }
}
