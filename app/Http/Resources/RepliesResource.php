<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RepliesResource extends JsonResource
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

            'reply' => $this->reply,

            'comment_id' => (string)$this->comment_id,
            'teacher_id' => (string)$this->teacher_id,
            // 'admin_name' => $admin->first_name . ' ' . $admin->middle_name . ' ' . $admin->last_name,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'teacher' =>
            UsersResource::collection($this->whenLoaded('teacher')),

            'comment' =>
            CommentsResource::collection($this->whenLoaded('comment')),

            /*there is error here in postman*/


            // 'relationships' => [
            //     'id'=>(string)$this->user->id,
            //     'user name'=>$this->user->name,
            //     'user email'=>$this->user->email,
            // ]
        ];
    }
}
