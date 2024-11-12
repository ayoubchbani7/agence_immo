<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PropertyFormRequest extends FormRequest
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
            "title"  => ['required','min:8'],
            "description"  => ['required','min:8'],
            "surface"  => ['required','integer' ],
            "rooms"  => ['required','integer',],
            "bedrooms"  => ['required','integer'],
            "floor"  => ['required','integer'],
            "price"  => ['required','integer'],
            "city"  => ['required'],
            "adress"  => ['required','min:5'],
            "code_postal"  => ['required','integer'],
            "sold"  => ['required','boolean'],
            'options' => 'required|array',
            'options.*' => 'exists:options,id',  // Chaque élément doit être un entier correspondant à un ID existant dans la table `options`
        ];
    }
}
