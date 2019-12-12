@extends('layouts.app')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12"><h1>{{__('language.Update Course')}}</h1></div>
            <div class="col-12">
                <form method="post" action="{{ route('course.update', $course->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label >{{__('language.Name')}}</label>
                        <input type="text" class="form-control @if($errors->has('Name')) is-invalid @endif"
                               name="Name" value="{{$course->Name}}">
                        @if($errors->has('Name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('Name')  }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>{{__('language.Content')}}</label>
                        <input type="text" class="form-control @if($errors->has('Content')) is-invalid @endif"
                               name="Content" value="{{$course->Content}}">
                        @if($errors->has('Content'))
                            <div class="invalid-feedback">
                                {{ $errors->first('Content')  }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label>{{__('language.Description')}}</label>
                        <input type="text" class="form-control @if($errors->has('Description')) is-invalid @endif"
                        name="Description" value="{{$course->Description}}">
                        @if($errors->has('Description'))
                            <div class="invalid-feedback">
                                {{ $errors->first('Description')  }}
                            </div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary"><i class="fas fa-check"></i></button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;"><i class="fa fa-times"></i></button>
                </form>
            </div>
        </div>
    </div>
@endsection
