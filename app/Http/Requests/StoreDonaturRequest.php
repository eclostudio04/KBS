<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDonaturRequest extends FormRequest
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
            //
            'nama' => ['required', 'string', 'max:225'],
            'phone_number' => ['required', 'string'],
            'proof' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'note' => ['required', 'string', 'max:7000'],

        ];
    }
}
