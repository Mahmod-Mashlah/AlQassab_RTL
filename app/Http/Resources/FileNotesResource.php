<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FileNotesResource extends JsonResource
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
            'note_id' => (string)$this->note_id,


            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'files' =>
            FilesResource::collection($this->whenLoaded('file')),

            'note' =>
            LessonsResource::collection($this->whenLoaded('note')),



            /*there is error here in postman*/


            // 'relationships' => [
            //     'id'=>(string)$this->user->id,
            //     'user name'=>$this->user->name,
            //     'user email'=>$this->user->email,
            // ]
        ];
    }
}
