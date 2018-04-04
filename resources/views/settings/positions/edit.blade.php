@extends('layouts.app')

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/')}}">Главная</a>
        <a class="breadcrumb-item" href="{{route('breadcrumb.settings')}}">Настройки</a>
        <a class="breadcrumb-item" href="{{route('settings.role')}}">Должности</a>
        <span class="breadcrumb-item active">Редактирование должности</span>
    </nav>
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Должности</h5>
        </div><!-- sl-page-title -->

        <div class="row row-sm mg-t-20">
            <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-25">Редактирование должности</h6>
                    <form action="{{route('settings.position.update', $positions->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('patch')}}
                        <div class="row row-xs">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Должность:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="position" class="form-control{{ $errors->has('position') ? ' is-invalid' : '' }}" value="{{$positions->position}}" >
                                @if ($errors->has('position'))
                                    <span class="invalid-feedback">
                                    <strong>{{ $errors->first('position') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div><!-- row -->
                        <div class="row row-xs mg-t-20">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Категория:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="text" name="category" class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" value="{{ $positions->category }}" >
                                @if ($errors->has('category'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row row-xs mg-t-30">
                            <div class="col-sm-8 mg-l-auto">
                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-outline-primary mg-r-5">Обновление</button>
                                    <a href="{{route('settings.position')}}" class="btn btn-outline-secondary">Назад</a>
                                </div><!-- form-layout-footer -->
                            </div><!-- col-8 -->
                        </div>
                    </form>
                </div><!-- card -->
            </div><!-- col-6 -->
        </div><!-- row -->

@endsection