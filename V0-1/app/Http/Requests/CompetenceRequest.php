<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompetenceRequest extends FormRequest
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
            'intitule' => ['required', 'string', 'max:120'],
            'description' => ['required', 'string', 'max:500'],
     ];
    }


    public function messages(){
        return [
            'intitule.required' => 'La rubrique "Intitulé " est obligatoire.',
            'description.required' => 'La rubrique "Descriptif " est obligatoire.',
        ];
    }
}
