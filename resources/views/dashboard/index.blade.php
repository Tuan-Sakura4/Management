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
                                <li class="breadcrumb-item active">Home</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form class="form-inline" action="{{route('get.chart.dashboard')}}" method="get">
                    <select name="course" class="form-control mb-2 mr-sm-2 col-md-11">
                        @foreach($courses as $course)
                            <option value="{{$course->id}}">{{$course->Name}}</option>
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-outline-success mb-2">Search</button>
                </form>
            </div>
        </div>
    </div>
@endsection
