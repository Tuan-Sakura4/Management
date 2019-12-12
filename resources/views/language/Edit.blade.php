@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Language management</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit</li>
                    </ol>
                </nav>
            </div>
            <div class="card-body">
                <form action="{{url('language/edit/'.$laguages->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="control-label"><b>Name</b></label>
                        <input type="text" name="tenngonngu" id="Name" class="form-control" value="{{$laguages->Name}}">
                        @error('Name')
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