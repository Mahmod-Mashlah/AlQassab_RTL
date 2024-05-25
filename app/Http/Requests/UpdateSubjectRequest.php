<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubjectRequest extends FormRequest
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

            'name' => ['required', 'string', 'max:50'],
            'min' => ['required', 'integer', 'min:10', 'max:1000'],
            'max' => ['required', 'integer', 'min:10', 'max:1000', 'gt:min' /*,new GreaterThanColumnRule('your_table', 'your_column')*/],

            'school_class_id' => ['required', 'exists:school_classes,id'],
            'teacher_id' => ['required', 'exists:users,id'],
            // 'admin_role' => ['required', 'string', 'exists:table,column'],

            // 'admin_id' => ['required', 'exists:users,id'],
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
