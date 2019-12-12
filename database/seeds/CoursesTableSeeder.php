<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CoursesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $course = new \App\Course();
        $course->Name = 'Ky Nang Mem';
        $course->Content = 'Ky Nang Mem';
        $course->Description = 'Ky Nang giao tiep';
        $course->save();
    }
}
