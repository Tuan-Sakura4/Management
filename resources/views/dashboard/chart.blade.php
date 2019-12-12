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
                                <li class="breadcrumb-item active">Chart</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div id="pie_chart"></div>
                    </div>
                    <div class="col-md-8"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
