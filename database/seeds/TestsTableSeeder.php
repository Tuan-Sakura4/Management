<?php

use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test = new \App\Test();
        $test->Date = '2020-11-11';
        $test->Point ='9';
        $test->Id_Student = '1';
        $test->Id_Course ='1';
        $test->save();

        $test = new \App\Test();
        $test->Date = '2020-11-11';
        $test->Point ='8';
        $test->Id_Student = '2';
        $test->Id_Course ='1';
        $test->save();
    }
}
