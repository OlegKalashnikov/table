@extends('layouts.app')

@section('css-page')
    <!-- vendor css -->
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/')}}">Главная</a>
        <a class="breadcrumb-item" href="{{route('breadcrumb.settings')}}">Настройки</a>
        <a class="breadcrumb-item" href="{{route('settings.user')}}">Пользователи</a>
        <span class="breadcrumb-item active">Создание пользователя</span>
    </nav>
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Пользователи</h5>
        </div><!-- sl-page-title -->

        <div class="row row-sm mg-t-20">

            <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-25">Создание пользователя</h6>
                    <form action="{{route('settings.user.store')}}" method="POST">
                        {{csrf_field()}}
                        <div class="row row-xs">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>ФИО:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Введите ФИО пользователя">
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div><!-- row -->
                        <div class="row row-xs mg-t-20">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Логин:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="login" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" value="{{ old('login') }}" placeholder="Введите логин пользователя">
                                @if ($errors->has('login'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('login') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row row-xs mg-t-20">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Роль:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
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
                        <div class="row row-xs mg-t-20">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Пароль:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Введите пароль пользователя">
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row row-xs mg-t-20">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Повторите пароль:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Повторите ввод пароля">
                            </div>
                        </div><!-- row -->
                        <div class="row row-xs mg-t-30">
                            <div class="col-sm-8 mg-l-auto">
                                <div class="form-layout-footer">
                                    <button class="btn btn-outline-primary mg-r-5">Создать</button>
                                    <a href="{{route('settings.user')}}" class="btn btn-outline-secondary">Назад</a>
                                </div><!-- form-layout-footer -->
                            </div><!-- col-8 -->
                        </div>
                    </form>
                </div><!-- card -->
            </div><!-- col-6 -->
        </div><!-- row -->


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