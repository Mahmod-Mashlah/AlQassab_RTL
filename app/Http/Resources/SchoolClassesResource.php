<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SchoolClassesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $mentor_id = User::find($this->mentor_id);

        return [

            'id' => (string)$this->id,

            'name' => $this->name,
            'number' => (string)$this->number,
            'section_count' => (string)$this->section_count,

            'mentor_id' => (string)$this->mentor_id,
            // 'admin_name' => $admin->first_name . ' ' . $admin->middle_name . ' ' . $admin->last_name,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'sections' =>
            SectionsResource::collection($this->whenLoaded('sections')),

            'mentor' =>
            UsersResource::collection($this->whenLoaded('mentor')),


            /*there is error here in postman*/


            // 'relationships' => [
            //     'id'=>(string)$this->user->id,
            //     'user name'=>$this->user->name,
            //     'user email'=>$this->user->email,
            // ]
        ];
    }
}
