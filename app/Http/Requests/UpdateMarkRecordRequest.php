<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMarkRecordRequest extends FormRequest
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

            'subject_id' => ['required', 'exists:subjects,id'],
            'student_id' => ['required', 'exists:users,id'],
            'year_id' => ['required', 'exists:years,id'],

            'homework1_id' => ['required', 'exists:homework,id'],
            'test1_id' => ['required', 'exists:tests,id'],
            'exam1_id' => ['required', 'exists:exams,id'],

            'homework2_id' => ['required', 'exists:homework,id'],
            'test2_id' => ['required', 'exists:tests,id'],
            'exam2_id' => ['required', 'exists:exams,id'],
        ];
    }

    public function messages()
    {
        return [
            // 'name.required' => 'لم يتم إدخال السنة , يرجى المحاولة مجدداً 😅 ',
            // 'year_start.required' => ' لم يتم إدخال بداية السنة , يرجى المحاولة مجدداً 😅',
            // 'year_end.required' => ' لم يتم إدخال نهاية السنة , يرجى المحاولة مجدداً 😅',

            // 'title.max' => 'العنوان يجب أن يحوي على الأكثر 150 حرف 😅',
            // 'year_start.min' => 'كلمة السر يجب أن تحوي على الأقل 6 رموز 😅',
            // 'year_start.unique' => 'بداية السنة موجود مسبقاً بالفعل , يرجى التغيير ثم المحاولة مجدداً 😅',
            // 'year_end.unique' =>  'نهاية السنة موجود مسبقاً بالفعل , يرجى التغيير ثم المحاولة مجدداً 😅',
        ];
    }
}
