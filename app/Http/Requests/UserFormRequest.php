<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'first_name' => ['required'],
            'middle_name' => ['required'],
            'last_name' => ['required'],
            'matric' => ['required', 'min:10', 'max:10', 'unique:students,matric' . $this->id],
            'email' => ['required', 'unique:users,email' . $this->id],
            'phone' => ['required', 'min:11', 'max:11', 'unique:students,phone' . $this->id],
            'supervisor' => ['required'],
            'session' => ['required', 'min:9', 'max:9'],
            'password' => ['required'],
            'cpassword' => ['required', 'same:password'],
        ];
        return $rules;

        if (in_array($this->method(), ['POST'])) {
            $rules['matric'] = ['required', 'min:10', 'max:10', 'unique:students'];
            $rules['email'] = ['required', 'unique:users'];
            $rules['phone'] = ['required', 'min:11', 'max:11', 'unique:students'];
        }
    }
}
