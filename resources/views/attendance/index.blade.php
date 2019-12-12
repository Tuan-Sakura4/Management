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
                                <li class="breadcrumb-item active" aria-current="page">Attendance management</li>
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
                                <form action="{{route('post.attendance')}}" method="post">
                                    @csrf
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create attendance</h4>
                                        <button type="button" class="close" data-dismiss="modal"><i
                                                class="fa fa-times"></i></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label"><b>Lesson</b></label>
                                            <select name="Id_Lesson" id="Id_Lesson" class="form-control">
                                                @foreach($lessons as $lesson)
                                                    @if($lesson->Date == date_format(now(), 'Y-m-d'))
                                                        <option value="{{$lesson->id}}">{{$lesson->Date}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            @error('Id_Lesson')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="demo">
                                            <div class="control-group">
                                                <label class="control-label"><b>Student</b></label>
                                                <select id="select-state" name="Id_Student[]" multiple
                                                        class="demo-default">
                                                    @foreach($students as $student)
                                                        <option value="{{$student->id}}">{{$student->Name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('Id_Student')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-sm btn-info"><i
                                                class="fa fa-check"></i></button>
                                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i
                                                class="fa fa-times"></i></button>
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
                            <th>Lesson</th>
                            <th>Student</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($attendances as $stt => $attendance)
                            <tr>
                                <th class="text-center">{{$loop->iteration}}</th>
                                <td>{{$attendance[0]->lesson->Date}}</td>
                                <td>
                                    @foreach($attendance as $item)
                                        <button class="btn btn-sm btn-outline-dark">{{$item->student->Name}}</button>
                                    @endforeach
                                </td>
                                <td class="text-right">
                                    <a class="btn btn-sm btn-outline-danger"
                                       href="{{route('get.destroy.attendance', $stt)}}"
                                       onclick="return confirm('You definitely want to delete?')"><i
                                            class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="text-right" colspan="3">Total attendance</th>
                            <th class="text-center">{{$total_attendance}}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
