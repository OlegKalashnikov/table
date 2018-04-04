@extends('layouts.app')

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/')}}">Главная</a>
        <a class="breadcrumb-item" href="{{route('breadcrumb.settings')}}">Настройки</a>
        <a class="breadcrumb-item" href="{{route('settings.department')}}">Подразделения</a>
        <span class="breadcrumb-item active">Редактирование подразделения</span>
    </nav>
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Подразделения</h5>
        </div><!-- sl-page-title -->

        <div class="row row-sm mg-t-20">
            <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-25">Редактирование подразделения</h6>
                    <form action="{{route('settings.department.update', $departments->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('patch')}}
                        <div class="row row-xs">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Должность:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="department" class="form-control{{ $errors->has('department') ? ' is-invalid' : '' }}" value="{{$departments->department}}" >
                                @if ($errors->has('department'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('department') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div><!-- row -->
                        <div class="row row-xs mg-t-30">
                            <div class="col-sm-8 mg-l-auto">
                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-outline-primary mg-r-5">Обновление</button>
                                    <a href="{{route('settings.department')}}" class="btn btn-outline-secondary">Назад</a>
                                </div><!-- form-layout-footer -->
                            </div><!-- col-8 -->
                        </div>
                    </form>
                </div><!-- card -->
            </div><!-- col-6 -->
        </div><!-- row -->

@endsection