@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                @include('layouts.alert')
                <div class="row">
                    <div class="col-md-11">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Lesson management</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-md-1 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>

                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="{{route('post.lesson')}}" method="post">
                                    @csrf
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create lesson</h4>
                                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label"><b>Date</b></label>
                                            <input type="date" name="Date" id="Date" class="form-control" value="{{old('Date')}}">
                                            @error('Date')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="control-label"><b>Teacher</b></label>
                                                    <select name="Id_Teacher" id="Id_Teacher" class="form-control" value="{{old('Id_Teacher')}}">
                                                        @foreach($teachers as $teacher)
                                                            <option value="{{$teacher->id}}">{{$teacher->Name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label"><b>Course</b></label>
                                                    <select name="Id_Course" id="Id_Course" class="form-control" value="{{old('Id_Course')}}">
                                                        @foreach($courses as $course)
                                                            <option value="{{$course->id}}">{{$course->Name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-sm btn-info"><i
                                                class="fa fa-check"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Date</th>
                            <th>Teacher</th>
                            <th>Course</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lessons as $lesson)
                            <tr>
                                <th class="text-center">{{$loop->iteration}}</th>
                                <td>{{$lesson->Date}}</td>
                                <td>{{$lesson->teacher->Name}}</td>
                                <td>{{$lesson->course->Name}}</td>
                                <td class="text-right">
                                    <a href="{{route('get.edit.lesson', $lesson->id)}}"
                                       class="btn btn-sm btn-outline-info"><i
                                            class="fa fa-edit"></i></a>
                                    <a class="btn btn-sm btn-outline-danger"
                                       href="{{route('get.destroy.lesson', $lesson->id)}}"
                                       onclick="return confirm('You definitely want to delete?')"><i
                                            class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="text-right" colspan="4">Total lesson</th>
                            <th class="text-center">{{$total_lesson}}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
