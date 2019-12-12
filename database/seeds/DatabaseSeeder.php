<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(TeacherSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(BusTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(TestsTableSeeder::class);

    }
}
