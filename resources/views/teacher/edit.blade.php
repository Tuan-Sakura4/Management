@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Teacher management</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-10">
                                <label class="control-label"><b>Name</b></label>
                                <input type="text" name="Name" id="Name" class="form-control" value="{{$teacher->Name}}">
                                @error('Name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label class="control-label"><b>Image</b></label>
                                <input type="file" name="Image" id="Image" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="control-label"><b>Gender</b></label>
                                <select name="Sex" id="Sex" class="form-control">
                                    <option value="0">male</option>
                                    <option value="1">woman</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><b>Phone</b></label>
                                <input type="number" name="Phone" id="Phone" class="form-control" value="{{$teacher->Phone}}">
                                @error('Phone')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="control-label"><b>Mail</b></label>
                                <input type="email" name="Mail" id="Mail" class="form-control" value="{{$teacher->Mail}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>Address</b></label>
                        <input type="text" name="Address" id="Address" class="form-control" value="{{$teacher->Address}}">
                        @error('Address')
                        <div class="text-danger">{{ $message }}</div>
                        @enderror
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
