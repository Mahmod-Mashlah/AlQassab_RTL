<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChatRequest extends FormRequest
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

            'summery' => ['required', 'string'],
            // 'admin_role' => ['required', 'string', 'exists:table,column'],
            'target' => ['required', 'string'],

            // 'admin_id' => ['required', 'exists:users,id'],
        ];
    }

    public function messages()
    {
        return [
            // 'name.required' => 'لم يتم إدخال السنة , يرجى المحاولة مجدداً 😅 ',
            // 'year_start.required' => ' لم يتم إدخال بداية السنة , يرجى المحاولة مجدداً 😅',
            // 'year_end.required' => ' لم يتم إدخال نهاية السنة , يرجى المحاولة مجدداً 😅',
        ];
    }
}
