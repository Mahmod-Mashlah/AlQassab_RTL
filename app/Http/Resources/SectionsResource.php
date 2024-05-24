<?php

namespace App\Http\Resources;

use App\Models\SchoolClass;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $school_class_id = SchoolClass::find($this->school_class_id);

        return [

            'id' => (string)$this->id,

            'section_number' =>  (string)$this->section_number,
            'max_students_number' => (string)$this->max_students_number,

            'school_class_id' => (string)$this->school_class_id,
            // 'admin_name' => $admin->first_name . ' ' . $admin->middle_name . ' ' . $admin->last_name,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'class' =>
            SchoolClassesResource::collection($this->whenLoaded('class')),
            /*there is error here in postman*/


            // 'relationships' => [
            //     'id'=>(string)$this->user->id,
            //     'user name'=>$this->user->name,
            //     'user email'=>$this->user->email,
            // ]
        ];
    }
}
