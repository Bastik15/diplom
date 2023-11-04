<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'country' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'image' => ['required', 'image', 'max:8192'],
        ];
    }
}
