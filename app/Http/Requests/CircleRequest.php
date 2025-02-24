<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CircleRequest extends FormRequest
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
            'name_ar' => 'required|string',
            'name_en' => 'required|string',
            'date' => 'required|date',
            'teacher_id' => 'required|exists:users,id',
        ];
    }

    public function messages(){
        return [
            'name_ar.required' => __('validation.the_name_required'),
            'name_en.required' => __('validation.the_name_required'),
            'name_ar.string' => __('validation.the_name_string'),
            'name_en.string' => __('validation.the_name_string'),
            'date.required' => __('validation.the_date_required'),
            'date.date' => __('validation.the_date_date'),
            'teacher_id.required' => __('validation.the_teacher_id_required'),
            'teacher_id.exists' => __('validation.the_teacher_id_exists'),
        ];
    }
}
