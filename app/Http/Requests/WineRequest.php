<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WineRequest extends FormRequest
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
            'wine'=> 'required|min:3|max:100',
            'winery'=> 'required|min:3|max:100',
            'location'=> 'required|min:3|max:100',
            'image'=> 'required|min:3|max:100',
        ];
    }

    public function messages(): array {
        return [
            'wine.required' => 'Il nome del vino è obbligatorio',
            'wine.min'=> 'Il campo deve avere minimo :min caratteri',
            'wine.max'=> 'Il campo deve avere massimo :max caratteri',

            'winery.required' => 'Il nome della cantina è obbligatorio',
            'winery.min'=> 'Il campo deve avere minimo :min caratteri',
            'winery.max'=> 'Il campo deve avere massimo :max caratteri',

            'location.required' => 'Il nome della location è obbligatorio',
            'location.min'=> 'Il campo deve avere minimo :min caratteri',
            'location.max'=> 'Il campo deve avere massimo :max caratteri',

            'image.required' => 'L\' immagine è obbligatoria',
            'image.min'=> 'Il campo deve avere minimo :min caratteri',
            'image.max'=> 'Il campo deve avere massimo :max caratteri',

        ];
    }
}
