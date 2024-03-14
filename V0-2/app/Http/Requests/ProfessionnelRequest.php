<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfessionnelRequest extends FormRequest
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
            'prenom' => ['required', 'string', 'max:25'],
            'nom' => ['required', 'string', 'max:40'],
            'cp' => ['required', 'string', 'max:5'],
            'ville' => ['required', 'string', 'max:38'],
            'telephone' => ['required', 'string', 'max:14'],
            'email' => ['required', 'email:rfc,dns', 'max:191'],
            'naissance' => ['required', 'date_format:Y-m-d'],
            'formation' => ['required', 'boolean'],
            'domaine' => ['required'],
            'metier_id' => ['required'],

            'competences_id' => ['required'],
        ];
    }
}
