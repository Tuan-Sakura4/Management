<?php

namespace App\Http\Controllers;

use App\Bu;
use App\Course;
use App\Language;
use App\Student;
use App\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $bus = Bu::all();

        $languages = Language::all();

        $courses = Course::all();

        return view('dashboard.index', compact('bus', 'languages', 'courses'));
    }

    public function chart(Request $request)
    {
        try {
            $tests = Test::search($request->course);
            if ($tests) {
                $data = DB::table('tests')->select(DB::raw('Point as Point'), DB::raw('count(id) as number'))->where('Id_Course', $request->course)->groupBy('Point')->get();
                $array[] = ['Point', 'Number'];
                foreach ($data as $key => $value) {
                    $array[++$key] = [$value->Point, $value->number];
                }
                return view('dashboard.chart', compact('tests'))->with('Point', json_encode($array));
            } else {

                return view('dashboard.search', compact('tests'));
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function search(Request $request)
    {
        try {
            $test = Test::search($request->Id_Course);


//            $tests= DB::table('tests')->where('Id_Course', '2')->join('students', 'students.id', '=', 'tests.Id_Student')->join('bus', 'bus.id', '=', 'students.Id_Bu')->groupBy('bus.id');

//            dd($tests);
//
            $tests =$test->groupBy('Id_Course');

            return view('dashboard.search', compact('tests'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function test(Request $request)
    {
        try {
            $test = Test::search($request->Id_Course);

            $tests= $test->groupBy('Id_Course');
            return view('dashboard.test', compact('tests'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
