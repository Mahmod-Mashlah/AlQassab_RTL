<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FileLessonsResource extends JsonResource
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


            'file_id' => (string)$this->file_id,
            'lesson_id' => (string)$this->lesson_id,


            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'files' =>
            FilesResource::collection($this->whenLoaded('file')),

            'lesson' =>
            LessonsResource::collection($this->whenLoaded('lesson')),



            /*there is error here in postman*/


            // 'relationships' => [
            //     'id'=>(string)$this->user->id,
            //     'user name'=>$this->user->name,
            //     'user email'=>$this->user->email,
            // ]
        ];
    }
}
