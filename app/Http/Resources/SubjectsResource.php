<?php

namespace App\Http\Resources;

use App\Models\SchoolClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjectsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $teacher = User::find($this->teacher_id);
        $class = SchoolClass::find($this->school_class_id);
        return [

            'id' => (string)$this->id,

            'name' => $this->name,
            'min' => (string) $this->min,
            'max' => (string) $this->max,


            'class_id' => (string)$this->school_class_id,
            // 'class_name' => $class_name,

            'teacher_id' => (string)$this->teacher_id,
            // 'teacher_name' => $teacher->first_name . ' ' . $teacher->middle_name . ' ' . $teacher->last_name,

            // 'admin_name' => $admin->first_name . ' ' . $admin->middle_name . ' ' . $admin->last_name,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'teacher' =>
            UsersResource::collection($this->whenLoaded('teacher')),

            'class' =>
            SchoolClassesResource::collection($this->whenLoaded('class')),

            'homeworks' =>
            HomeworksResource::collection($this->whenLoaded('homeworks')),

            /*there is error here in postman*/


            // 'relationships' => [
            //     'id'=>(string)$this->user->id,
            //     'user name'=>$this->user->name,
            //     'user email'=>$this->user->email,
            // ]
        ];
    }
}
