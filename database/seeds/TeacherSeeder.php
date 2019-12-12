<?php

use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Teacher::Create(
            ['Name' => 'A', 'Sex' => '1', 'Phone' => '0123456789', 'Mail' => 'a@gmail.com', 'Address' => 'Hà Nội']
        );
//
    }
}
