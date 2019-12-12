@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Lesson management</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="control-label"><b>Name</b></label>
                        <input type="text" name="Date" id="Date" class="form-control" value="{{$lesson->Date}}">
                        @error('Date')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="control-label"><b>Teacher</b></label>
                                <select name="Id_Teacher" id="Id_Teacher" class="form-control">
                                    @foreach($teachers as $teacher)
                                        <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="control-label"><b>Course</b></label>
                                <select name="Id_Course" id="Id_Course" class="form-control">
                                    @foreach($courses as $course)
                                        <option value="{{$course->id}}">{{$course->Name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-sm btn-info"><i
                                class="fa fa-check"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
