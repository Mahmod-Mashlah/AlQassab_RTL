<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UsersResource extends JsonResource
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

            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'birth_date' => $this->birth_date,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,


            'protests' =>
            ProtestsResource::collection($this->whenLoaded('protests')),

            'adverts' =>
            AdvertsResource::collection($this->whenLoaded('adverts')),

            'chats' =>
            ChatsResource::collection($this->whenLoaded('chats')),

            'classes' =>
            SchoolClassesResource::collection($this->whenLoaded('mentor_classes')),

            'teacher-subjects' =>
            SubjectsResource::collection($this->whenLoaded('teacher_subjects')),

            'homeworks' =>
            HomeworksResource::collection($this->whenLoaded('homeworks')),

            'tests' =>
            TestsResource::collection($this->whenLoaded('tests')),

            'exams' =>
            ExamsResource::collection($this->whenLoaded('exams')),

            'marks' =>
            MarkRecordsResource::collection($this->whenLoaded('marks')),


            'lessons' =>
            LessonsResource::collection($this->whenLoaded('lessons')),

            // 'relationships' => [
            //     'id'=>(string)$this->user->id,
            //     'user name'=>$this->user->name,
            //     'user email'=>$this->user->email,
            // ]
        ];
    }
}
