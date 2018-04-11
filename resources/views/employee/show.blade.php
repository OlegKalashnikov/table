@extends('layouts.app')

@section('css-page')
    <!-- DataTables -->
    <link href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Список сотрудников закрепленных за вами</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Сотрудники</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-12">
                <div class="card-box table-responsive">
                    <p class="text-muted font-13 m-b-30">
                        <a href="{{route('my.employee.create')}}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Добавление сотрудника</a>

                    </p>
                    <div>

                    </div>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ФИО сотрудника</th>
                            <th>Должность</th>
                            <th>Подразделение</th>
                            <th>Ставка</th>
                            <th width="120px">Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($myEmployees as $employee)
                            <tr>
                                <td>{{$employee->employee->employee}}</td>
                                <td>{{$employee->position->position}}</td>
                                <td>{{$employee->department->department}}</td>
                                <td>{{$employee->rate}}</td>
                                <td>
                                    <a href="{{route('my.employee.edit', $employee->id)}}" title="Редактировать" class="btn waves-effect waves-light btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('my.employee.calendar', $employee->id)}}" title="Календарь" class="btn waves-effect waves-light btn-info"><i class="fa fa-calendar-check-o"></i></a>
                                    <a href="" title="Удалить запись" data-toggle="modal" data-target="#modaldestroy" class="btn waves-effect waves-light btn-danger" data-modalid="{{$employee->id}}"><i class="fa fa-trash"></i></a>
                                    </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end row -->

    </div>


    {{--<nav class="breadcrumb sl-breadcrumb">--}}
        {{--<a class="breadcrumb-item" href="{{url('/')}}">Главная</a>--}}
        {{--<span class="breadcrumb-item active">Сотрудники</span>--}}
    {{--</nav>--}}

    {{--<div class="sl-pagebody">--}}
        {{--<div class="sl-page-title">--}}
            {{--<h5>Сотрудники</h5>--}}
            {{--<div>--}}
                {{--<a href="{{route('my.employee.create')}}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Добавление сотрудника</a>--}}

            {{--</div>--}}
        {{--</div><!-- sl-page-title -->--}}

        {{--<div class="card pd-20 pd-sm-40">--}}
            {{--<h6 class="card-body-title">Общий список</h6>--}}

            {{--@if(session('success'))--}}
                {{--<div class="alert alert-success" role="alert">--}}
                    {{--<button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                    {{--<div class="d-flex align-items-center justify-content-start">--}}
                        {{--<i class="icon ion-ios-checkmark alert-icon tx-18 mg-t-5 mg-xs-t-0"></i>--}}
                        {{--<span>{{session('success')}}</span>--}}
                    {{--</div><!-- d-flex -->--}}
                {{--</div>--}}
            {{--@endif--}}

            {{--<div class="table-wrapper">--}}
                {{--<table id="datatable1" class="table display responsive nowrap">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th class="wd-15p">ФИО сотрудника</th>--}}
                        {{--<th class="wd-15p">Должность</th>--}}
                        {{--<th class="wd-15p">Подразделение</th>--}}
                        {{--<th class="wd-15p">Ставка</th>--}}
                        {{--<th class="wd-20p">Действия</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                        {{--@foreach($myEmployees as $employee)--}}
                            {{--<tr>--}}
                                {{--<td>{{$employee->employee->employee}}</td>--}}
                                {{--<td>{{$employee->position->position}}</td>--}}
                                {{--<td>{{$employee->department->department}}</td>--}}
                                {{--<td>{{$employee->rate}}</td>--}}
                                {{--<td>--}}
                                    {{--<a href="{{route('my.employee.edit', $employee->id)}}" title="Редактировать" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></a>--}}
                                    {{--<a href="{{route('my.employee.calendar', $employee->id)}}" title="Календарь" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-calendar-check-o"></i></div></a>--}}
                                    {{--<a href="" title="Удалить запись" data-toggle="modal" data-target="#modaldestroy" class="btn btn-outline-danger btn-icon" data-modalid="{{$employee->id}}"><div><i class="fa fa-trash"></i></div></a>--}}
                                {{--</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div><!-- table-wrapper -->--}}
        {{--</div><!-- card -->--}}

        {{--<div id="modaldestroy" class="modal fade">--}}
            {{--<div class="modal-dialog modal-sm" role="document">--}}
                {{--<div class="modal-content bd-0 tx-14">--}}
                    {{--<div class="modal-header pd-x-20">--}}
                        {{--<h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Уведомление</h6>--}}
                        {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                            {{--<span aria-hidden="true">&times;</span>--}}
                        {{--</button>--}}
                    {{--</div>--}}
                    {{--<div class="modal-body pd-20">--}}
                        {{--<p class="mg-b-5">Вы действительно хотите удалить запись?</p>--}}
                        {{--<form action="{{route('my.employee.destroy', 'myemployee')}}" method="POST">--}}
                            {{--{{method_field('delete')}}--}}
                            {{--{{csrf_field()}}--}}
                            {{--<input type="hidden" id="id" value="" name="id">--}}
                    {{--</div>--}}
                    {{--<div class="modal-footer justify-content-center">--}}
                        {{--<button type="submit" class="btn btn-danger pd-x-20">Удалить</button>--}}
                        {{--<button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Закрыть</button>--}}
                    {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}
            {{--</div><!-- modal-dialog -->--}}
        {{--</div><!-- modal -->--}}
@endsection

@section('js-page')
    <!-- Required datatable js -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
        <!-- Buttons examples -->
    <script src="{{asset('plugins/datatables/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/jszip.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/pdfmake.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/vfs_fonts.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.html5.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.print.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/buttons.colVis.min.js')}}"></script>
        <!-- Responsive examples -->
        <script src="{{asset('plugins/datatables/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').DataTable();

                //Buttons examples
                var table = $('#datatable-buttons').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf']
                });

                table.buttons().container()
                    .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
            } );

        </script>

            {{--<script src="{{asset('js/jquery.dataTables.js')}}"></script>--}}
            {{--<script src="{{asset('js/select2.min.js')}}"></script>--}}

            {{--<script>--}}
                {{--$('#modaldestroy').on('show.bs.modal', function (event) {--}}
                    {{--var button = $(event.relatedTarget);--}}
                    {{--var id = button.data('modalid');--}}
                    {{--var modal = $(this);--}}
                    {{--modal.find('.modal-body #id').val(id);--}}
                {{--})--}}
            {{--</script>--}}

            {{--<script>--}}
                {{--$(function(){--}}
                    {{--'use strict';--}}

                    {{--$('#datatable1').DataTable({--}}
                        {{--responsive: true,--}}
                        {{--language: {--}}
                            {{--searchPlaceholder: 'Поиск...',--}}
                            {{--sSearch: '',--}}
                            {{--lengthMenu: '_MENU_ записей/на странице',--}}
                        {{--}--}}
                    {{--});--}}

                    {{--// Select2--}}
                    {{--$('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });--}}
                {{--});--}}
            {{--</script>--}}
@endsection