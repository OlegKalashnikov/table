@extends('layouts.app')

@section('css-page')
    <!-- vendor css -->
    <link href="{{asset('css/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/')}}">Главная</a>
        <a class="breadcrumb-item" href="{{route('breadcrumb.settings')}}">Настройки</a>
        <span class="breadcrumb-item active">Пользователи</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Пользователи</h5>
            <div>
                <a href="{{route('settings.user.create')}}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Создание пользователя</a>
            </div>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Общий список</h6>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">ФИО</th>
                        <th class="wd-15p">Логин</th>
                        <th class="wd-20p">Роль</th>
                        <th class="wd-20p">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->login}}</td>
                                <td>{{$user->id}}</td>
                                <td>
                                    <a href="" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></a>
                                    <a href="" class="btn btn-outline-danger btn-icon"><div><i class="fa fa-trash"></i></div></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
@endsection

@section('js-page')
    <script src="{{asset('js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>

    <script>
        $(function(){
            'use strict';

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Поиск...',
                    sSearch: '',
                    lengthMenu: '_MENU_ записей/на странице',
                }
            });

            // Select2
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

        });
    </script>
@endsection