<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reply>
 */
class ReplyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();
        $comments = Comment::all();

        // for ($teacher_id = 30; $teacher_id < 40; $teacher_id++) {

        foreach ($comments as $comment) {

            DB::table('replies')->insert([

                'reply' => "this is reply" . " for the comment " . $comment->id,
                // "comment for student $teacher_id at lesson $lesson_id ",
                'comment_id' => $comment->id,
                'teacher_id' => $faker->numberBetween(30, 39),

                'created_at' => now(),
                'updated_at' => now()

            ]);
        }
        // }

        return [
            //
        ];
    }
}
