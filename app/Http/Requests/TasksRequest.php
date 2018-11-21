<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class TasksRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'estimated_time' => 'required|numeric',
            'start_date' => 'required|date',
            'deadline_date' => 'required|date',
            'fixed_rate' => 'numeric'
        ];
    }
}
