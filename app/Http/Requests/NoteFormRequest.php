<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteFormRequest extends FormRequest
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
            'title' => ['required','min:1'],
            'note' => ['required'],
            'date' => ['required'],
            'coeff' => ['required'],
            'timetable_id' => ['required'],
            'user_id' => ['required'],
        ];
    }
}
