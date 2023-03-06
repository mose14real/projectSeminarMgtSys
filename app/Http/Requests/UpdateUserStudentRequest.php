<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            // 'first_name' => ['required'],
            // 'middle_name' => ['required'],
            // 'last_name' => ['required'],
            // 'email' => ['required', 'unique:users,email'],
            'matric' => ['required', 'min:10', 'max:10'],
            'phone' => ['required', 'min:11', 'max:11'],
            'supervisor' => ['required'],
            'session' => ['required', 'min:9', 'max:9']
        ];

        return $rules;
    }
}
