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
                                <li class="breadcrumb-item active" aria-current="page">Teacher management</li>
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
                                <form action="{{route('post.teacher')}}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create teacher</h4>
                                        <button type="button" class="close" data-dismiss="modal"><i class="fa fa-times"></i></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label"><b>Name</b></label>
                                            <input type="text" name="Name" id="Name" class="form-control" value="{{old('Name')}}">
                                            @error('Name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label class="control-label"><b>Gender</b></label>
                                                    <select name="Sex" id="Sex" class="form-control">
                                                        <option value="0">male</option>
                                                        <option value="1">woman</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-5">
                                                    <label class="control-label"><b>Phone</b></label>
                                                    <input type="number" name="Phone" id="Phone" class="form-control" value="{{old('Phone')}}">
                                                    @error('Phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="control-label"><b>Image</b></label>
                                                    <input type="file" name="Image" id="Image" class="form-control" value="{{old('Image')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"><b>Mail</b></label>
                                            <input type="email" name="Mail" id="Mail" class="form-control" value="{{old('Mail')}}">
                                            @error('Mail')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"><b>Address</b></label>
                                            <input type="text" name="Address" id="Address" class="form-control" value="{{old('Address')}}">
                                            @error('Address')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
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
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Info</th>
                            <th>Lesson</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teachers as $teacher)
                            <tr>
                                <th class="text-center">{{$loop->iteration}}</th>
                                <td>{{$teacher->Name}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img style="width: 70px; height: 70px;" src="{{ asset('') }}/{{ pare_url_file($teacher->Image) }}" alt="">
                                        </div>
                                        <div class="col-md-10">
                                            <ul>
                                                <li>Phone: {{$teacher->Phone}}</li>
                                                <li>Mail: {{$teacher->Mail}}</li>
                                                <li>Address: {{$teacher->Address}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                                <td>{{$teacher->lessons->count()}}</td>
                                <td class="text-right">
                                    <a href="{{route('get.edit.teacher', $teacher->id)}}"
                                       class="btn btn-sm btn-outline-info"><i
                                            class="fa fa-edit"></i></a>
                                    <a class="btn btn-sm btn-outline-danger"
                                       href="{{route('get.destroy.teacher', $teacher->id)}}"
                                       onclick="return confirm('You definitely want to delete?')"><i
                                            class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th class="text-right" colspan="4">Total teacher</th>
                            <th class="text-center">{{$total_teacher}}</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
