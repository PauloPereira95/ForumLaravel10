<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSupport extends FormRequest
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
        $rules =  [
            'subject' => 'required|min:3|max:255|unique:supports',
            'body' => [
                'required',
                'min:3',
                'max:500'
            ]
        ];
        if($this->method() === 'PUT'){
            $rules['subject'] = [
                'required',
                'min:3',
                'max:255',
                // allow to update subject with that id (video 17 min 4:20)
                // "unique:supports,subject,{$this->id},id"
                Rule::unique('supports')->ignore($this->id),
            ];
        }
        return $rules;
    }
}
