<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeTestRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'identifiacation' => ['required', 'string', 'max:100', 'unique:employees,identifiacation'],
            'birth' => ['required'],
            'salary' => ['required', 'integer'],
            'marital_status' => ['required', 'in:single,married,divorced'],
            'bonus' => ['nullable', 'numeric', 'between:-999999.99,999999.99'],
            'order' => ['required', 'integer', 'gt:0'],
            'department_id' => ['required', 'integer', 'exists:departments,id'],
        ];
    }
}
