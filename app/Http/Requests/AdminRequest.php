<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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


        $adminId = $this->route('admin')->id ?? null;

        return [
            'name'=>'required|string',
            'email'=>$adminId ? 'required|string|unique:admins,email,' . $adminId : 'required|string|unique:admins,email',
            'password'=>$adminId ? 'nullable|confirmed|min:8|max:32':'required|confirmed|min:8|max:32',
            'role_id'=>'required|exists:roles,id'
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
            'role_id.required' => __('validation.the_role_id_required'),
            'role_id.exists' => __('validation.the_role_id_exists'),

        ];
    }
}
