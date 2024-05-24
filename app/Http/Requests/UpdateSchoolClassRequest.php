<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSchoolClassRequest extends FormRequest
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

            'name' => ['required', 'string', 'max:20'],
            'number' => ['required', 'integer', 'in:1,2,3,4,5,6,7,8,9,10,11,12'],
            'section_count' => ['required', 'integer', 'in:1,2,3,4,5'],

            'mentor_id' => ['required', 'exists:users,id'],

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

            'name.max' => 'الاسم يجب أن يحوي على الأكثر 20 حرف 😅',
            'section_count.in' => 'عدد الشعب يجب أن يكون إحدى هذه القيم : 1,2,3,4,5 😅',
            // 'year_start.min' => 'كلمة السر يجب أن تحوي على الأقل 6 رموز 😅',
            // 'year_start.unique' => 'بداية السنة موجود مسبقاً بالفعل , يرجى التغيير ثم المحاولة مجدداً 😅',
            // 'year_end.unique' =>  'نهاية السنة موجود مسبقاً بالفعل , يرجى التغيير ثم المحاولة مجدداً 😅',
        ];
    }
}
