<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class YearsResource extends JsonResource
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

            'name' => $this->name,
            'year_start' => $this->year_start,
            'year_end' => $this->year_end,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            // 'seasons' =>
            // SeasonsResource::collection($this->whenLoaded('seasons')),


            // not worked [
            //     'id' => (string)$this->seasons()->season_id,
            //     'number' => $this->seasons()->name,
            //     'season_start' => $this->seasons()->email,
            //     'season_end' => $this->seasons()->email,
            //     'days_number' => $this->seasons()->email,
            //     'year_id' => $this->seasons()->email,
            //     'created_at' => $this->seasons()->email,
            //     'updated_at' => $this->seasons()->email,
            // ]

            // 'relationships' => [
            //     'id' => (string)$this->user->id,
            //     'user name' => $this->user->name,
            //     'user email' => $this->user->email,
            // ]
        ];
    }
}
