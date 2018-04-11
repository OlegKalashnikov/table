@extends('layouts.app')

@section('css-page')
    <!-- Plugins css-->
    <link href="{{asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/multiselect/css/multi-select.css')}}"  rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('breadcrumb.settings')}}">Настройки</a></li>
                        <li class="breadcrumb-item"><a href="{{route('settings.user')}}">Пользователи</a></li>
                        <li class="breadcrumb-item active">Создание ползователя</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title m-t-0">Создание пользователя</h4>

                    <div class="p-20">
                        <form role="form" action="{{route('my.employee.store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="employee_id" class="col-sm-4 form-control-label">ФИО пользователя:<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Введите ФИО пользователя">
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hori-pass1" class="col-sm-4 form-control-label">Логин<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" name="login" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" value="{{ old('login') }}" placeholder="Введите логин пользователя">
                                    @if ($errors->has('login'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('login') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hori-pass2" class="col-sm-4 form-control-label">Роль
                                    <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <select name="role_id" id="role_id" class="form-control select2">
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->description}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('login'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('login') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="webSite" class="col-sm-4 form-control-label">Пароль<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Введите пароль пользователя">
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="webSite" class="col-sm-4 form-control-label">Повторите пароль<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Повторите ввод пароля">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Создать
                                    </button>
                                    <a href="{{route('settings.user')}}" class="btn btn-secondary waves-effect m-l-5">Назад</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            </div>
        </div>


    </div>

@endsection

@section('js-page')
    <script src="{{asset('js/select2.min.js')}}"></script>

    <script>
        $(function(){
            'use strict';

            $('.select2').select2({
            });

        });
    </script>
@endsection