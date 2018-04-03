@extends('layouts.app')

@section('css-page')

    <link href="{{asset('css/spectrum.css')}}" rel="stylesheet">

@endsection

@section('content')

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/')}}">Главная</a>
        <a class="breadcrumb-item" href="{{route('breadcrumb.settings')}}">Настройки</a>
        <a class="breadcrumb-item" href="{{route('settings.position')}}">Должности</a>
        <span class="breadcrumb-item active">Импорт данных</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Form Elements</h5>
            <p>Forms are used to collect user information with different element types of input, select, checkboxes, radios and more.</p>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40 mg-t-50">
            <h6 class="card-body-title">File Browser</h6>
            <p class="mg-b-20 mg-sm-b-30">A custom styled file browser.</p>

            <div class="row">
                <div class="col-lg-3">
                    <label class="custom-file">
                        <input type="file" id="file" class="custom-file-input">
                        <span class="custom-file-control"></span>
                    </label>
                </div><!-- col -->
                <div class="col-lg-3 mg-t-40 mg-lg-t-0">
                    <label class="custom-file">
                        <input type="file" id="file2" class="custom-file-input">
                        <span class="custom-file-control custom-file-control-primary"></span>
                    </label>
                </div><!-- col -->
                <div class="col-lg-3 mg-t-40 mg-lg-t-0">
                    <label class="custom-file">
                        <input type="file" class="custom-file-input">
                        <span class="custom-file-control custom-file-control-inverse"></span>
                    </label>
                </div><!-- col -->
            </div><!-- row -->
        </div><!-- card -->

@endsection