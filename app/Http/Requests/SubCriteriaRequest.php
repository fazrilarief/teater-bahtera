<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCriteriaRequest extends FormRequest
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
            'sub_criteria_name' => 'required|string',
            'sub_criteria_value' => 'required|integer',
            'criterias_id' => 'integer',
        ];
    }
}
