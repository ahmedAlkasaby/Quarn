<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class TeacherRequest extends FormRequest
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

        $TeacherId = $this->route('teacher') ?? null;

        
        return [
            'name'=>'required|string',
            'email'=>$TeacherId ? 'required|string|unique:users,email,' . $TeacherId : 'required|string|unique:users,email',
            'password'=>$TeacherId ? 'nullable|confirmed|min:8|max:32':'required|confirmed|min:8|max:32',
        ];
    }

    public function messages(){
        return [
            'name.required' => __('validation.the_name_required'),
            'name.string' => __('validation.the_name_string'),
            'email.required' => __('validation.the_email_required'),
            'email.string' => __('validation.the_email_string'),
            'email.unique' => __('validation.the_email_unique'),

            'password.required' => __('validation.the_password_required'),
            'password.confirmed' => __('validation.the_password_confirmed'),
            'password.min' => __('validation.the_password_min'),
            'password.max' => __('validation.the_password_max'),

        ];
    }
}
