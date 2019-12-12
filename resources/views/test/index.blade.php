@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            @include('layouts.alert')
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-11">
                        <h6 class="m-0 font-weight-bold text-primary">{{__('language.Tests management')}}</h6>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i>
                        </button>
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{route('test.store')}}" method="post" >
                                        @csrf
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{__('language.Create test')}}</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="control-label"><b>{{__('language.Student Name')}}</b></label>
                                                        <select class="form-control" name="Id_Student">
                                                            @foreach($students as $student)
                                                                <option value="{{ $student->id }}">{{ $student->Name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('Id_Name'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('Id_Name')  }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="control-label"><b>{{__('language.Course Name')}}</b></label>
                                                        <select class="form-control" name="Id_Course">
                                                            @foreach($courses as $course)
                                                                <option value="{{ $course->id }}">{{ $course->Name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('Id_Course'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('Id_Course')  }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label"><b>{{__('language.Point')}}</b></label>
                                                <input type="number" class="form-control @if($errors->has('Point')) is-invalid @endif"
                                                       name="Point">
                                                @if($errors->has('Point'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('Point')  }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"><b>{{__('language.Date')}}</b></label>
                                                <input type="date" class="form-control @if($errors->has('Date')) is-invalid @endif"
                                                       name="Date">
                                                @if($errors->has('Date'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('Date')  }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-sm btn-info"><i
                                                    class="fa fa-check"></i></button>
                                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                        </div>
                                    </form>
                                </div>
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
                            <th>STT</th>
                            <th>{{__('language.Student Name')}}</th>
                            <th>{{__('language.Course Name')}}</th>
                            <th>{{__('language.Point')}}</th>
                            <th>{{__('language.Date')}}</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tests as $key=>$test)
                            <tr>
                                <td>{{++$key}}</td>
                                <td class="align-middle">{{ $test->student->Name }}</td>
                                <td class="align-middle">{{ $test->course->Name }}</td>
                                <td>{{$test->Point}}</td>
                                <td>{{$test->Date}}</td>
                                <td class="align-middle"><a href="{{ route('test.edit', $test->id) }}"><i class="far fa-edit"></i></a></td>
                                <td class="align-middle"><a href="{{ route('test.destroy', $test->id) }}"
                                                            class="text-danger"
                                                            onclick="return confirm('Bạn chắc chắn muốn xóa?')"><i class="fa fa-times"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
