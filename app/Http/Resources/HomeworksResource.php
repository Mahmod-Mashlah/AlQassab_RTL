<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeworksResource extends JsonResource
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

            'mark' => (string)$this->mark,

            'subject_id' => (string)$this->subject_id,
            'season_id' => (string)$this->season_id,
            'student_id' => (string)$this->student_id,
            // 'admin_name' => $admin->first_name . ' ' . $admin->middle_name . ' ' . $admin->last_name,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'student' =>
            UsersResource::collection($this->whenLoaded('student')),

            'season' =>
            SeasonsResource::collection($this->whenLoaded('season')),

            'subject' =>
            SubjectsResource::collection($this->whenLoaded('subject')),

            'marks' =>
            MarkRecordsResource::collection($this->whenLoaded('marks')),

            /*there is error here in postman*/


            // 'relationships' => [
            //     'id'=>(string)$this->user->id,
            //     'user name'=>$this->user->name,
            //     'user email'=>$this->user->email,
            // ]
        ];
    }
}
