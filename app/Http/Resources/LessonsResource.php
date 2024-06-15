<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LessonsResource extends JsonResource
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
            'lecture_number' => (string)$this->lecture_number,
            'date' => $this->date,
            'summery' => $this->summery,
            'ideas' => $this->ideas,

            'subject_id' => (string)$this->subject_id,
            'teacher_id' => (string)$this->teacher_id,

            // 'admin_name' => $admin->first_name . ' ' . $admin->middle_name . ' ' . $admin->last_name,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'subject' =>
            SubjectsResource::collection($this->whenLoaded('subject')),

            'teacher' =>
            UsersResource::collection($this->whenLoaded('teacher')),

            'ratings' =>
            RatingsResource::collection($this->whenLoaded('ratings')),

            'comments' =>
            CommentsResource::collection($this->whenLoaded('comments')),

            'files' =>
            FileLessonsResource::collection($this->whenLoaded('lesson_files')),


            // 'relationships' => [
            //     'id'=>(string)$this->user->id,
            //     'user name'=>$this->user->name,
            //     'user email'=>$this->user->email,
            // ]
        ];
    }
}
