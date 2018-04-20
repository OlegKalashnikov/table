@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Роли</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('breadcrumb.settings')}}">Настройки</a></li>
                        <li class="breadcrumb-item"><a href="{{route('settings.role')}}">Роли</a></li>
                        <li class="breadcrumb-item active">Редактирование роли</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title m-t-0">Редактирование роли</h4>

                    <div class="p-20">
                        <form role="form" action="{{route('settings.role.update')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="employee_id" class="col-sm-4 form-control-label">Наименование роли:<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$roles->name}}" >
                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hori-pass1" class="col-sm-4 form-control-label">Описание роли:<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" value="{{ $roles->description }}" >
                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Обновить
                                    </button>
                                    <a href="{{route('settings.role')}}" class="btn btn-secondary waves-effect m-l-5">Назад</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



{{--@extends('layouts.app')--}}

{{--@section('content')--}}
    {{--<nav class="breadcrumb sl-breadcrumb">--}}
        {{--<a class="breadcrumb-item" href="{{url('/')}}">Главная</a>--}}
        {{--<a class="breadcrumb-item" href="{{route('breadcrumb.settings')}}">Настройки</a>--}}
        {{--<a class="breadcrumb-item" href="{{route('settings.role')}}">Роли</a>--}}
        {{--<span class="breadcrumb-item active">Редактирование роли</span>--}}
    {{--</nav>--}}
    {{--<div class="sl-pagebody">--}}
        {{--<div class="sl-page-title">--}}
            {{--<h5>Роли</h5>--}}
        {{--</div><!-- sl-page-title -->--}}

        {{--<div class="row row-sm mg-t-20">--}}
            {{--<div class="col-xl-6 mg-t-25 mg-xl-t-0">--}}
                {{--<div class="card pd-20 pd-sm-40 form-layout form-layout-5">--}}
                    {{--<h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-25">Редактирование роли</h6>--}}
                    {{--<form action="{{route('settings.role.update', $roles->id)}}" method="POST">--}}
                        {{--{{csrf_field()}}--}}
                        {{--{{method_field('patch')}}--}}
                        {{--<div class="row row-xs">--}}
                            {{--<label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Наименование роли:</label>--}}
                            {{--<div class="col-sm-8 mg-t-10 mg-sm-t-0">--}}
                                {{--<input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$roles->name}}" >--}}
                                {{--@if ($errors->has('name'))--}}
                                    {{--<span class="invalid-feedback">--}}
                                    {{--<strong>{{ $errors->first('name') }}</strong>--}}
                                {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div><!-- row -->--}}
                        {{--<div class="row row-xs mg-t-20">--}}
                            {{--<label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Описание роли:</label>--}}
                            {{--<div class="col-sm-8 mg-t-10 mg-sm-t-0">--}}
                                {{--<input type="text" name="description" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" value="{{ $roles->description }}" >--}}
                                {{--@if ($errors->has('description'))--}}
                                    {{--<span class="invalid-feedback">--}}
                                        {{--<strong>{{ $errors->first('description') }}</strong>--}}
                                    {{--</span>--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{--<div class="row row-xs mg-t-30">--}}
                            {{--<div class="col-sm-8 mg-l-auto">--}}
                                {{--<div class="form-layout-footer">--}}
                                    {{--<button type="submit" class="btn btn-outline-primary mg-r-5">Обновление</button>--}}
                                    {{--<a href="{{route('settings.role')}}" class="btn btn-outline-secondary">Назад</a>--}}
                                {{--</div><!-- form-layout-footer -->--}}
                            {{--</div><!-- col-8 -->--}}
                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div><!-- card -->--}}
            {{--</div><!-- col-6 -->--}}
        {{--</div><!-- row -->--}}

{{--@endsection--}}