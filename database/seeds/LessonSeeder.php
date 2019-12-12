<?php

use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Lesson::Create(
            ['Date' => '2019-12-12', 'Id_Teacher' => '1', 'Id_Course' => '1']
        );
    }
}
