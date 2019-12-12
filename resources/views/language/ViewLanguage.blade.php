@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            @include('layouts.alert')
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-11">
                        <h6 class="m-0 font-weight-bold text-primary">Language management</h6>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i>
                        </button>
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{url('language/add')}}" method="post"  enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h4 class="modal-title">Create Language</h4>
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
                                        </div>
                                        <div class="modal-footer text-center">
                                            <button type="submit" class="btn btn-sm btn-info"><i
                                                    class="fa fa-check"></i></button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times-circle"></i></button>
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
                            <th>Name</th>
                            
                            <th>chức Năng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($languages as $rows)
                            <tr>
                                <td>{{$rows->Name}}</td>
                                
                                <td><a href="{{url('language/edit/'.$rows->id)}}"><i class="fas fa-pencil-alt">
                                </i></a>&nbsp;&nbsp; <a href="{{url('language/delete/'.$rows->id)}}"><i class="far fa-trash-alt"></i></a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
