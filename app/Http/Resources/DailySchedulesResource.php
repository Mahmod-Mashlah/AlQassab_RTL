<?php

// namespace App\Http\Resources;

// use App\Models\Season;
// use Illuminate\Http\Request;
// use Illuminate\Http\Resources\Json\JsonResource;

// class DailySchedulesResource extends JsonResource
// {
//     /**
//      * Transform the resource into an array.
//      *
//      * @return array<string, mixed>
//      */
//     public function toArray(Request $request): array
//     {
//         $season = Season::find($this->season_id);

//         return [

//             'id' => (string)$this->id,

//             'day' => $this->day,
//             'lesson_number' => $this->lesson_number,
//             'class' => $this->class,
//             'section' => $this->section,
//             'teacher_name' => $this->teacher_name,
//             'subject_name' => $this->day,


//             'season_id' => (string)$this->season_id,
//             // 'admin_id' => (string)$this->admin_id,
//             // 'admin_name' => $admin->first_name . ' ' . $admin->middle_name . ' ' . $admin->last_name,

//             'created_at' => $this->created_at,
//             'updated_at' => $this->updated_at,

//             'season' =>
//             SeasonsResource::collection($this->whenLoaded('season')),
//             /*there is error here in postman*/

//             // 'relationships' => [
//             //     'id'=>(string)$this->user->id,
//             //     'user name'=>$this->user->name,
//             //     'user email'=>$this->user->email,
//             // ]
//         ];
//     }
// }
