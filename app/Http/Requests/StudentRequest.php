<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'name'=>'required|string',
            'circle_id'=>'required|exists:circles,id'
        ];
    }

    public function messages(){
        return [
            'name.required' => __('validation.the_name_required'),
            'name.string' => __('validation.the_name_string'),
            'circle_id.required' => __('validation.the_circle_id_required'),
            'circle_id.exists' => __('validation.the_circle_id_exists'),
        ];
    }
}
