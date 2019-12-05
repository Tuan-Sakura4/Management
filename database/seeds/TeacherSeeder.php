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
            ['Name' => 'A', 'Sex' => '1', 'Phone' => '0123456789', 'Mail' => 'a@gmail.com', 'Image' => '', 'Address' => 'Hà Nội']
        );
//        $location = array('A', 'B', 'C');
//        for ($i = 0; $i <= 3; $i++) {
//
//            DB::table('teachers')->insert([
//                'name' => $location[$i],
//                'sex' => 0,
//                'mobile' => '0123456789',
//                'mail' => 'a@gmail.com',
//                'address' => 'Hà nội'
//            ]);
//        }
    }
}
