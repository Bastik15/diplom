<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'product' => ['required', 'integer'],
            'type' => ['required', 'integer'],
            'partner' => ['required', 'integer', 'sometimes'],
            'worker' => ['required', 'integer', 'sometimes'],
            'amount' => ['required', 'integer']
        ];
    }
}
