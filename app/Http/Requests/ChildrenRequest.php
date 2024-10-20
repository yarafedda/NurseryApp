<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChildrenRequest extends FormRequest
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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'date_of_birth' => ['required', 'date', function ($attribute, $value, $fail) {
            $age = \Carbon\Carbon::parse($value)->age;
            if ($age < 3 || $age > 5) {
                $fail('The child must be between 3 and 5 years old.');
            }
        }],
            'gender'=>'required|string|in:male,female,other',
            'guardian_id' => 'required|exists:guardians,id',
            
            
        ];
    }

    public function messages()
{
    return [
        'date_of_birth.required' => 'The date of birth is required.',
        'date_of_birth.date' => 'Please enter a valid date.',
        'date_of_birth.between' => 'The child must be between 3 and 5 years old.',
        'firstname.required' => 'The first name is required.',
        'lastname.required' => 'The last name is required.',
        'gender.required' => 'The gender is required.',
        'gender.in' => 'Please select a valid gender.',
        'guardian_id.required' => 'The guardian ID is required.',
    ];
}
}
