@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Список сотрудников организации</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="#">Справочники</a></li>
                        <li class="breadcrumb-item"><a href="{{route('directory.employee')}}">Сотрудники</a></li>
                        <li class="breadcrumb-item active">Создание сотрудника</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title m-t-0">Добавление данных</h4>
                    <div class="p-20">
                        <form role="form" method="POST" action="{{route('directory.employee.store')}}">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="" class="col-sm-4 form-control-label">ФИО сотрудника<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" name="employee" class="form-control" value="{{old('employee')}}">
                                    @if ($errors->has('employee'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('employee') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Создать
                                    </button>
                                    <a href="{{route('directory.employee')}}" class="btn btn-secondary waves-effect m-l-5">
                                        Назад
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection