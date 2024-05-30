<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MarkRecordsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [

            'id' => (string)$this->id,

            'sum1' => (string)$this->sum1,
            'sum2' => (string)$this->sum2,
            'final_sum' => (string)$this->final_sum,
            'final_result' => (string)$this->final_result,

            'year_id' => (string)$this->year_id,
            'student_id' => (string)$this->student_id,
            'subject_id' => (string)$this->subject_id,

            'homework1_id' => (string)$this->homework1_id,
            'test1_id' => (string)$this->test1_id,
            'exam1_id' => (string)$this->exam1_id,

            'homework2_id' => (string)$this->homework2_id,
            'test2_id' => (string)$this->test2_id,
            'exam2_id' => (string)$this->exam2_id,

            // 'admin_name' => $admin->first_name . ' ' . $admin->middle_name . ' ' . $admin->last_name,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'student' =>
            UsersResource::collection($this->whenLoaded('student')),

            'year' =>
            YearsResource::collection($this->whenLoaded('year')),

            'subject' =>
            SubjectsResource::collection($this->whenLoaded('subject')),

            'homework1' =>
            HomeworksResource::collection($this->whenLoaded('homework1')),

            'test1' =>
            TestsResource::collection($this->whenLoaded('test1')),

            'exam1' =>
            ExamsResource::collection($this->whenLoaded('exam1')),

            'homework2' =>
            HomeworksResource::collection($this->whenLoaded('homework2')),

            'test2' =>
            TestsResource::collection($this->whenLoaded('test2')),

            'exam2' =>
            ExamsResource::collection($this->whenLoaded('exam2')),


            /*there is error here in postman*/


            // 'relationships' => [
            //     'id'=>(string)$this->user->id,
            //     'user name'=>$this->user->name,
            //     'user email'=>$this->user->email,
            // ]
        ];
    }
}
