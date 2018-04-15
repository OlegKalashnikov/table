@extends('layouts.app')

@section('css-page')

@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Список помесячных графиков</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Графики</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">


                <div class="col-12 m-t-20">
                    <p class="text-muted font-13 m-b-10">
                        {{--<a href="{{route('graphic.create')}}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Добавление графика</a>--}}
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Добавление графика <span class="caret"></span></button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('graphic.create.medicalstaff')}}">Для медперсонала</a>
                            <a class="dropdown-item" href="{{route('graphic.create.other')}}">Для прочих</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('graphic.create.employee')}}">Отдельно для сотрудника</a>
                        </div>
                    </div>
                    </p>

                    <div class="p-20">
                        <div class="">
                            <table class="table table-bordered table-responsive">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                    <th>Table heading</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                    <td>Table cell</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div>

    </div>


@endsection

@section('js-page')

@endsection
