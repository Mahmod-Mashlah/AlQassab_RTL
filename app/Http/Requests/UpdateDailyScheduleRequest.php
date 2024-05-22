<?php

// namespace App\Http\Requests;

// use Illuminate\Foundation\Http\FormRequest;

// class UpdateDailyScheduleRequest extends FormRequest
// {
//     /**
//      * Determine if the user is authorized to make this request.
//      */
//     public function authorize(): bool
//     {
//         return true;
//     }

//     /**
//      * Get the validation rules that apply to the request.
//      *
//      * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
//      */
//     public function rules(): array
//     {
//         return [
//             //integer|digits:4|between:1900,'.Carbon::now()->year
//             'day' => ['required', 'string', 'exists:daily_schedules,day'],
//             'lesson_number' => ['required', 'string'],
//             'class' => ['required', 'string'],
//             'section' => ['required', 'string'],
//             'teacher_name' => ['required', 'string'],
//             'subject_name' => ['required', 'string'],
//             'season_id' => ['required', 'unique:seasons,id'],
//             // 'priority' => ['required', 'in:low,medium,high'],
//         ];
//     }

//     public function messages()
//     {
//         return [
//             // 'name.required' => 'لم يتم إدخال السنة , يرجى المحاولة مجدداً 😅 ',
//             // 'year_start.required' => ' لم يتم إدخال بداية السنة , يرجى المحاولة مجدداً 😅',
//             // 'year_end.required' => ' لم يتم إدخال نهاية السنة , يرجى المحاولة مجدداً 😅',

//             // // 'year_start.min' => 'كلمة السر يجب أن تحوي على الأقل 6 رموز 😅',
//             // 'year_start.unique' => 'بداية السنة موجود مسبقاً بالفعل , يرجى التغيير ثم المحاولة مجدداً 😅',
//             // 'year_end.unique' =>  'نهاية السنة موجود مسبقاً بالفعل , يرجى التغيير ثم المحاولة مجدداً 😅',
//         ];
//     }
// }
