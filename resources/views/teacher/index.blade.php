@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            @include('layouts.alert')
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-11">
                        <h6 class="m-0 font-weight-bold text-primary">Teacher management</h6>
                    </div>
                    <div class="col-md-1 text-right">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i>
                        </button>
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
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-sm btn-info"><i
                                                    class="fa fa-check"></i></button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                                    class="fa fa-close"></i></button>
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
                            <th>Phone</th>
                            <th>Mail</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($teachers as $teacher)
                            <tr>
                                <td>{{$teacher->Name}}</td>
                                <td>{{$teacher->Phone}}</td>
                                <td>{{$teacher->Mail}}</td>
                                <td>{{$teacher->Address}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
