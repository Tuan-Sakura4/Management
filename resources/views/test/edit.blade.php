@extends('layouts.app')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12"><h1>{{__('language.Update Test')}}</h1></div>
            <div class="col-12">
                <form method="post" action="{{ route('test.update', $test->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label >{{__('language.Student Name')}}</label>
                        <select class="form-control" name="Id_Student">
                            @foreach($students as $student)
                                <option
                                    @if($student->Id_Student == $student->id)
                                    {{"selected"}}
                                    @endif
                                    value="{{$student->id}}">{{$student->Name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('Id_Student'))
                            <div class="invalid-feedback">
                                {{ $errors->first('Id_Student')  }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>{{__('language.Course Name')}}</label>
                        <select class="form-control" name="Id_Course">
                            @foreach($courses as $course)
                                <option
                                    @if($course->Id_Student == $course->id)
                                    {{"selected"}}
                                    @endif
                                    value="{{$course->id}}">{{$course->Name}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('Id_Course'))
                            <div class="invalid-feedback">
                                {{ $errors->first('Id_Course')  }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>{{__('language.Point')}}</label>
                        <input type="number" class="form-control @if($errors->has('Point')) is-invalid @endif"
                               name="Point" value="{{$test->Point}}">
                        @if($errors->has('Point'))
                            <div class="invalid-feedback">
                                {{ $errors->first('Point')  }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>{{__('language.Date')}}</label>
                        <input type="date" class="form-control @if($errors->has('Date')) is-invalid @endif"
                               name="Date" value="{{$test->Date}}">
                        @if($errors->has('Date'))
                            <div class="invalid-feedback">
                                {{ $errors->first('Date')  }}
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary"><i
                            class="fa fa-check"></i></button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;"><i class="fa fa-times"></i></button>
                </form>
            </div>
        </div>
    </div>
@endsection
