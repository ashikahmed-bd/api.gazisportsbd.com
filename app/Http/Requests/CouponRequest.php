<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CouponRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $coupon = $this->route('coupon');

        return [
            'code' => [
                'required',
                'string',
                'max:50',
                'uppercase',
                Rule::unique('coupons', 'code')->ignore($coupon?->id),
            ],

            'type' => [
                'required',
                Rule::in(['fixed', 'percent']),
            ],

            'discount' => [
                'required',
                'numeric',
                'min:0.01',
                $this->type === 'percent'
                    ? 'max:100'
                    : 'max:99999999.99',
            ],

            'minimum_amount' => ['nullable', 'numeric', 'min:0',],
            'expires_at' => ['nullable', 'date',],
            'active' => ['nullable', 'boolean',],
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('code')) {
            $this->merge([
                'code' => strtoupper(trim($this->code)),
            ]);
        }
    }
}
