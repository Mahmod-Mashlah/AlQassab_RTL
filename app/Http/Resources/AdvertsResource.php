<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvertsResource extends JsonResource
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

            'title' => $this->title,
            'body' => $this->body,
            'admin_role' => $this->admin_role,
            'target' => $this->target,

            'admin_id' => (string)$this->admin_id,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,


            'admin' =>
            UsersResource::collection($this->whenLoaded('user')),

            // 'relationships' => [
            //     'id'=>(string)$this->user->id,
            //     'user name'=>$this->user->name,
            //     'user email'=>$this->user->email,
            // ]
        ];
    }
}
