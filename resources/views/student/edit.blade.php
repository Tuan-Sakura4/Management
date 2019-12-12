@extends('layouts.app')

@section('content')
    <div class="col-12 col-md-12">
        <div class="row">
            <div class="col-12"><h1>{{__('language.Update Student')}}</h1></div>
            <div class="col-12">
                <form method="post" action="{{ route('student.update', $student->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="control-label"><b>{{__('language.Name')}}</b></label>
                        <input type="text" class="form-control @if($errors->has('Name')) is-invalid @endif"
                               name="Name" value="{{$student->Name}}">
                        @if($errors->has('Name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('Name')  }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>{{__('language.Birth')}}</b></label>
                        <input type="text" class="form-control @if($errors->has('Birth')) is-invalid @endif"
                               name="Birth" value="{{$student->Birth}}">
                        @if($errors->has('Birth'))
                            <div class="invalid-feedback">
                                {{ $errors->first('Birth')  }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>{{__('language.Sex')}}</b></label>
                        <select class="form-control" name="Sex">
                            @if($student->Sex == $student->Sex)
                                {{"selected"}}
                            @endif
                            <option value="1">{{__('language.Man')}}</option>
                            <option value="0">{{__('language.Woman')}}</option>
                        </select>
                        @if($errors->has('Sex'))
                            <div class="invalid-feedback">
                                {{ $errors->first('Sex')  }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>{{__('language.Image')}}</b></label>
                        <input type="file" class="form-control "
                               name="Image" value="{{$student->Image}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>{{__('language.Mail')}}</b></label>
                        <input type="email" class="form-control @if($errors->has('Mail')) is-invalid @endif"
                               name="Mail" value="{{$student->Mail}}">
                        @if($errors->has('Mail'))
                            <div class="invalid-feedback">
                                {{ $errors->first('Mail')  }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>{{__('language.Phone')}}</b></label>
                        <input type="number" class="form-control @if($errors->has('Phone')) is-invalid @endif"
                               name="Phone" value="{{$student->Phone}}">
                        @if($errors->has('Phone'))
                            <div class="invalid-feedback">
                                {{ $errors->first('Phone')  }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>{{__('language.Address')}}</b></label>
                        <input type="text" class="form-control @if($errors->has('Address')) is-invalid @endif"
                               name="Address" value="{{$student->Address}}">
                        @if($errors->has('Mail'))
                            <div class="invalid-feedback">
                                {{ $errors->first('Address')  }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>{{__('language.Language')}}</b></label>
                        <select class="form-control" name="Id_Language">
                            @foreach($languages as $language)
                                <option
                                    @if($language->Id_Language == $language->id)
                                    {{"selected"}}
                                    @endif
                                    value="{{ $language->id }}">{{ $language->Name }}
                                </option>
                            @endforeach
                        </select>
                        @if($errors->has('Id_Language'))
                            <div class="invalid-feedback">
                                {{ $errors->first('Id_Language')  }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="control-label"><b>Bu</b></label>
                        <select class="form-control" name="Id_Bu">
                            @foreach($bus as $bu)
                                <option
                                    @if($bu->Id_Bu == $bu->id)
                                    {{"selected"}}
                                    @endif
                                    value="{{ $bu->id }}">{{ $bu->Name }}
                                </option>
                            @endforeach
                        </select>
                        @if($errors->has('Id_Bu'))
                            <div class="invalid-feedback">
                                {{ $errors->first('Id_Bu')  }}
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
