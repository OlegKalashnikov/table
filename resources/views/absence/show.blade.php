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
                    <h4 class="page-title float-left">Список сотрудников не явившихся на работу по причине {{$title}}</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Неявки</li>
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
                        @if($type == 1)
                        <a href="{{route('absence.sickleave.create')}}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Добавление сотрудника</a>
                        @endif
                        @if($type == 2)
                            <a href="{{route('absence.holiday.create')}}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Добавление сотрудника</a>
                        @endif
                        @if($type == 3)
                            <a href="{{route('absence.absenteeism.create')}}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Добавление сотрудника</a>
                        @endif
                        @if($type == 4)
                            <a href="{{route('absence.withoutcontent.create')}}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Добавление сотрудника</a>
                        @endif
                        @if($type == 5)
                            <a href="{{route('absence.apprenticeship.create')}}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Добавление сотрудника</a>
                        @endif
                        @if($type == 6)
                            <a href="{{route('absence.specialization.create')}}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Добавление сотрудника</a>
                        @endif
                        @if($type == 7)
                            <a href="{{route('absence.businesstrip.create')}}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Добавление сотрудника</a>
                        @endif
                    </p>
                    <div>

                    </div>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th rowspan="2">ФИО сотрудника</th>
                            <th rowspan="2">Должность</th>
                            <th rowspan="2">Подразделение</th>
                            <th colspan="2" style="text-align: center">Период</th>
                            <th rowspan="2" width="120px">Действия</th>
                        </tr>
                        <tr>
                            <th>С</th>
                            <th>По</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $value)
                                <tr>
                                    <td>{{$value->myemployee->employee->employee}}</td>
                                    <td>{{$value->myemployee->position->position}}</td>
                                    <td>{{$value->myemployee->department->department}}</td>
                                    <td>{{$value->from}}</td>
                                    <td>{{$value->before}}</td>
                                    <td></td>
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