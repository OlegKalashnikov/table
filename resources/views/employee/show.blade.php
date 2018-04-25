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
                    <div class="row">
                        <div class="col-3">
                            <a href="{{route('my.employee.create')}}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Добавление сотрудника</a>
                        </div>
                        <div class="col-6">
                            <div class="btn-group">
                                <button type="button" class="btn btn-outline-primary dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false">Формирование данных для графика и табеля <span class="caret"></span></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('graphic.create.medicalstaff')}}">Для медперсонала</a>
                                    <a class="dropdown-item" href="{{route('graphic.create.other')}}">Для прочих</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{route('graphic.create.employee')}}">Отдельно для сотрудника</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-muted font-13 m-b-30">
                        @if(Session::has('success'))
                            <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {{ session('success') }}</em></div>
                        @endif
                    </p>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ФИО сотрудника</th>
                            <th>Должность</th>
                            <th>Подразделение</th>
                            <th>Ставка</th>
                            @can('action', Auth::user())<th>Владелец</th>@endcan
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
                                @can('action', Auth::user())<td>{{\App\User::nameUser($employee->user_id)}}</td>@endcan
                                <td>
                                    <a href="{{route('my.employee.edit', $employee->id)}}" title="Редактировать" class="btn waves-effect waves-light btn-info"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('graphic.create.employee.id', $employee->id)}}" title="Формировать данные для графика и табеля" class="btn waves-effect waves-light btn-info"><i class="fa fa-calendar-check-o"></i></a>
                                    <a href="{{route('dismissal.create.employee', $employee->id)}}" title="Уволить" class="btn waves-effect waves-light btn-warning"><i class="fa fa-times-rectangle-o"></i></a>
                                    @can('action', Auth::user())<a href="" title="Уволить" data-toggle="modal" data-target="#modaldestroy" class="btn waves-effect waves-light btn-danger" data-modalid="{{$employee->id}}"><i class="fa fa-trash"></i></a>@endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end row -->

    </div>
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
@endsection