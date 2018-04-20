@extends('layouts.app')

@section('css-page')

    <link href="{{asset('css/spectrum.css')}}" rel="stylesheet">

@endsection

@section('content')

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/')}}">Главная</a>
        <a class="breadcrumb-item" href="{{route('breadcrumb.settings')}}">Настройки</a>
        <a class="breadcrumb-item" href="{{route('directory.position')}}">Должности</a>
        <span class="breadcrumb-item active">Импорт данных</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Загрузка данных</h5>
            <p>csv, xls, xlsx</p>
        </div><!-- sl-page-title -->

        <div class="row row-sm mg-t-20">
            <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-20">Загрузка списка должностей</h6>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('directory.position.upload')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="row row-xs">
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <input type="file" class="form-control-file" name="upload">
                            </div>
                        </div><!-- row -->
                        <div class="row row-xs mg-t-30">
                            <div class="col-sm-8 mg-l-auto">
                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-info mg-r-5">Загрузить</button>
                                    <a href="{{route('directory.position')}}" class="btn btn-secondary">Назад</a>
                                </div><!-- form-layout-footer -->
                            </div><!-- col-8 -->
                        </div>
                    </form>
                </div><!-- card -->
            </div><!-- col-6 -->
        </div><!-- row -->

@endsection