<?php

namespace Database\Factories;

use App\Models\Note;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FileNote>
 */
class FileNoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        $notes = Note::all();
        // $seasons_ids = Season::all()->pluck('id');

        for ($i = 1; $i <= 20; $i = $i + 4) {
            foreach ($notes as $note) {

                DB::table('file_notes')->insert([

                    'file_id' => $i,
                    'note_id' => $note->id,

                    'created_at' => now(),
                    'updated_at' => now()

                ]);
            }
        }


        return [
            //
        ];
    }
}
