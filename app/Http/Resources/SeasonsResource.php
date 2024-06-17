<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeasonsResource extends JsonResource
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

            'number' => $this->number,
            'season_start' => $this->season_start,
            'season_end' => $this->season_end,
            'days_number' => $this->days_number,
            'year_id' => (string)$this->year_id,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,


            'year' =>
            YearsResource::collection($this->whenLoaded('years')),

            'homeworks' =>
            HomeworksResource::collection($this->whenLoaded('homeworks')),

            'tests' =>
            TestsResource::collection($this->whenLoaded('tests')),

            'exams' =>
            ExamsResource::collection($this->whenLoaded('exams')),

            'day_schedule' =>
            DaySchedulesResource::collection($this->whenLoaded('day_schedule')),

            'test_schedule' =>
            TestSchedulesResource::collection($this->whenLoaded('test_schedule')),

            'exam_schedule' =>
            ExamSchedulesResource::collection($this->whenLoaded('exam_schedule')),


            // 'relationships' => [
            //     'id'=>(string)$this->user->id,
            //     'user name'=>$this->user->name,
            //     'user email'=>$this->user->email,
            // ]
        ];
    }
}
