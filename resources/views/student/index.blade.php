@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="card shadow mb-4">
            @include('layouts.alert')
            <div class="card-header py-3">
                <div class="row">
                    <div class="col-md-11">
                        <h6 class="m-0 font-weight-bold text-primary">{{__('language.Students management')}}</h6>
                    </div>
                    <div class="col-md-1 ">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                            <i class="fa fa-plus"></i>
                        </button>
                        <div class="modal" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{route('student.store')}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{__('language.Create student')}}</h4>
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
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="control-label"><b>{{__('language.Language')}}</b></label>
                                                        <select class="form-control" name="Id_Language">
                                                            @foreach($languages as $language)
                                                                <option value="{{ $language->id }}">{{ $language->Name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('Id_Language'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('Id_Language')  }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="control-label"><b>{{__('language.Bu')}}</b></label>
                                                        <select class="form-control" name="Id_Bu">
                                                            @foreach($bus as $bu)
                                                                <option value="{{ $bu->id }}">{{ $bu->Name }}</option>
                                                            @endforeach
                                                        </select>
                                                        @if($errors->has('Id_Bu'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('Id_Bu')  }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-md-4"> <label class="control-label"><b>{{__('language.Birth')}}</b></label>
                                                        <input type="date" class="form-control @if($errors->has('Birth')) is-invalid @endif"
                                                               name="Birth">
                                                        @if($errors->has('Birth'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('Birth')  }}
                                                            </div>
                                                        @endif</div>
                                                    <div class="col-md-4"> <label class="control-label"><b>{{__('language.Sex')}}</b></label>
                                                        <select class="form-control" name="Sex">
                                                            <option value="1">Nam</option>
                                                            <option value="0">Nu</option>
                                                        </select>
                                                        @if($errors->has('Sex'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('Sex')  }}
                                                            </div>
                                                        @endif</div>
                                                    <div class="col-md-4"> <label class="control-label"><b>{{__('language.Image')}}</b></label>
                                                        <input type="file" class="form-control" name="Image"></div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"><b>Mail</b></label>
                                                <input type="email" class="form-control @if($errors->has('Mail')) is-invalid @endif"
                                                       name="Mail">
                                                @if($errors->has('Mail'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('Mail')  }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"><b>{{__('language.Phone')}}</b></label>
                                                <input type="number" class="form-control @if($errors->has('Phone')) is-invalid @endif"
                                                       name="Phone">
                                                @if($errors->has('Phone'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('Phone')  }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label"><b>{{__('language.Address')}}</b></label>
                                                <input type="text" class="form-control @if($errors->has('Address')) is-invalid @endif"
                                                       name="Address">
                                                @if($errors->has('Mail'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('Address')  }}
                                                    </div>
                                                @endif
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
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>{{__('language.Name')}}</th>
                            <th>{{__('language.Image')}}</th>
                            <th>{{__('language.Birth')}}</th>
                            <th>{{__('language.Sex')}}</th>
                            <th>{{__('language.Info')}}</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $key=>$student)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td class="align-middle">{{ $student->Name }}</td>
                                <td class="align-middle"><img style="width: 70px; height: 70px;" src="{{ asset('') }}/{{ pare_url_file($student->Image) }}" alt=""></td>
                                <td class="align-middle">{{ $student->Birth }}</td>
                                @if( $student->Sex == 1 )
                                <td class="align-middle">{{__('language.Man')}}</td>
                                @else
                                <td class="align-middle">{{__('language.Woman')}}</td>
                                @endif
                                <td class="align-middle">
                                    Email: {{ $student->Mail }}
                                    <br>Phone: {{ $student->Phone }}
                                    <br>Address: {{ $student->Address }}
                                </td>
                                <td class="align-middle"><a href="{{ route('student.edit', $student->id) }}"><i class="far fa-edit"></i></a></td>
                                <td class="align-middle"><a href="{{ route('student.destroy', $student->id) }}"
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
