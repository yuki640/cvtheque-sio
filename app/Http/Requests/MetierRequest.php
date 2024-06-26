<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Validation\Rule;

use Illuminate\Support\Str;

class MetierRequest extends FormRequest
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
            'libelle' => ['required', 'string', 'max:120'],
            'description' => ['required', 'string', 'max:500'],
            'slug' => $this->method() == 'POST' ?
            ['required', 'string', 'max:120', 'unique:metiers,slug'] :
            ['required', 'string', 'max:120',
            Rule::unique('metiers', 'slug')->ignore($this->metier)],
     ];
    }

    public function messages(){
        return [
            'intitule.required' => 'La rubrique "Intitulé " est obligatoire.',
            'description.required' => 'La rubrique "Descriptif " est obligatoire.',
            'slug.required' => 'La rubrique "slug" est obligatoire.',
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->slug),
        ]);
    }
}
