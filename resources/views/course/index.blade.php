@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            @include('layouts.alert')
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-11">
                        <h6 class="m-0 font-weight-bold text-primary">{{__('language.Courses management')}}</h6>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i>
                        </button>
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{route('course.store')}}" method="post">
                                        @csrf
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{__('language.Create course')}}</h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label class="control-label"><b>{{__('language.Name')}}</b></label>
                                                <input type="text" class="form-control @if($errors->has('Name')) is-invalid @endif"
                                                       name="Name">
                                                @if($errors->has('Name'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('Name')  }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"><b>{{__('language.Content')}}</b></label>
                                                <input type="text" class="form-control @if($errors->has('Content')) is-invalid @endif"
                                                       name="Content">
                                                @if($errors->has('Content'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('Content')  }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"><b>{{__('language.Description')}}</b></label>
                                                <input type="text" class="form-control @if($errors->has('Description')) is-invalid @endif"
                                                       name="Description">
                                                @if($errors->has('Description'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('Description')  }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"><b>{{__('language.Total')}}</b></label>
                                                <input type="number" class="form-control @if($errors->has('Total')) is-invalid @endif"
                                                       name="Total">
                                                @if($errors->has('Total'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('Total')  }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-sm btn-info"><i
                                                    class="fas fa-check"></i></button>
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
                            <th>{{__('language.Name')}}</th>
                            <th>{{__('language.Content')}}</th>
                            <th>{{__('language.Name')}}</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $key => $course)
                            <tr>
                                <td>{{++$key}}</td>
                                <td>{{$course->Name}}</td>
                                <td>{{$course->Content}}</td>
                                <td>{{$course->Description}}</td>
                                <td class="align-middle"><a href="{{ route('course.edit', $course->id) }}"><i class="far fa-edit"></i></a></td>
                                <td class="align-middle"><a href="{{ route('course.destroy', $course->id) }}"
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
