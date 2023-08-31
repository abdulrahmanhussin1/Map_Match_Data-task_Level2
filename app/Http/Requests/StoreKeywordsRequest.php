<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreKeywordsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            
                'desc_ar'=>'nullable|string|max:100',
                'desc_en'=>'nullable|string|max:100',
                'desc_lat'=>'nullable|string|max:100',

            
        ];
    }
}
