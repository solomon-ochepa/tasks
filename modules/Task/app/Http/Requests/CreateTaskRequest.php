<?php

namespace Modules\Task\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateTaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'form.name' => ['required', 'string', 'max:32', $this->id ? "unique:tasks,name,{$this->id},id" : 'unique:tasks,name'],
            'form.priority' => ['nullable', 'integer', 'min:1'],
            'form.project_id' => ['nullable', 'uuid'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
