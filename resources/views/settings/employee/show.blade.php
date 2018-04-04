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
        <span class="breadcrumb-item active">Сотрудники</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Сотрудники</h5>
            <div>
                <a href="{{route('settings.employee.create')}}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Создание сотрудника</a>

                <a href="{{route('settings.employee.upload')}}" class="btn btn-outline-primary"><i class="fa fa-upload"></i> Импорт данных</a>

            </div>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Общий список</h6>

            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                        <i class="icon ion-ios-checkmark alert-icon tx-18 mg-t-5 mg-xs-t-0"></i>
                        <span>{{session('success')}}</span>
                    </div><!-- d-flex -->
                </div>
            @endif
            @if(session('log'))
                <div class="alert alert-success" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <div class="d-flex align-items-center justify-content-start">
                        <i class="icon ion-ios-checkmark alert-icon tx-18 mg-t-5 mg-xs-t-0"></i>
                        <span>Было загруженно {{session('log')}} записей</span>
                    </div><!-- d-flex -->
                </div>
            @endif

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                    <tr>
                        <th class="wd-15p">ФИО сотрудника</th>
                        <th class="wd-20p">Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee->employee}}</td>
                            <td>
                                <a href="{{route('settings.employee.edit', $employee->id)}}" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></a>
                                <a href="" data-toggle="modal" data-target="#modaldestroy" class="btn btn-outline-danger btn-icon" data-modalid="{{$employee->id}}"><div><i class="fa fa-trash"></i></div></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->

        <div id="modaldestroy" class="modal fade">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content bd-0 tx-14">
                    <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Уведомление</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pd-20">
                        <p class="mg-b-5">Вы действительно хотите удалить запись?</p>
                        <form action="{{route('settings.employee.destroy', 'employee')}}" method="POST">
                            {{method_field('delete')}}
                            {{csrf_field()}}
                            <input type="hidden" id="id" value="" name="id">
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-danger pd-x-20">Удалить</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Закрыть</button>
                    </div>
                    </form>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->
@endsection

@section('js-page')
    <script src="{{asset('js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>

    <script>
        $('#modaldestroy').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('modalid');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
        })
    </script>

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