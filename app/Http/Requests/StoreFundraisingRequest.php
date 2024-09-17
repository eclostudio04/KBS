<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFundraisingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->hasAnyRole('owner');
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
            'name' => ['required', 'string', 'max:225'],
            'categories_id' => ['required', 'integer'],
            'target_amount' => ['required', 'integer'],
            'thumbnail' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'about' => ['requires', 'string', 'max:7000'],
        ];
    }
}