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
                                <form action="{{route('post.teacher')}}" method="post">
                                    @csrf
                                    <div class="modal-header">
                                        <h4 class="modal-title">Create teacher</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label class="control-label"><b>Name</b></label>
                                            <input type="text" name="Name" id="Name" class="form-control">
                                            @error('Name')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label class="control-label"><b>Gender</b></label>
                                                    <select name="Sex" id="Sex" class="form-control">
                                                        <option value="0">male</option>
                                                        <option value="1">woman</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="control-label"><b>Phone</b></label>
                                                    <input type="number" name="Phone" id="Phone" class="form-control">
                                                    @error('Phone')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"><b>Mail</b></label>
                                            <input type="email" name="Mail" id="Mail" class="form-control">
                                            @error('Email')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label"><b>Address</b></label>
                                            <input type="text" name="Address" id="Address" class="form-control">
                                            @error('Address')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-sm btn-info"><i
                                                class="fa fa-check"></i></button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">&times;</button>
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
                            <th>Phone</th>
                            <th>Mail</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teachers as $teacher)
                            <tr>
                                <th>{{$loop->iteration}}</th>
                                <td>{{$teacher->Name}}</td>
                                <td>{{$teacher->Phone}}</td>
                                <td>{{$teacher->Mail}}</td>
                                <td>{{$teacher->Address}}</td>
                                <td class="text-right">
                                    <a href="{{route('get.edit.teacher', $teacher->id)}}"
                                       class="btn btn-sm btn-outline-info"><i
                                            class="fa fa-edit"></i></a>
                                    <form method="POST" action="{{route('get.destroy.teacher', $teacher->id)}}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
