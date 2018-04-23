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
                    <h4 class="page-title float-left">Список уволенных сотрудников</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Увольнения</li>
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
                            <a href="{{route('dismissal.create')}}" class="btn btn-outline-primary"><i class="fa fa-minus"></i> Увольнение сотрудника</a>
                        </p>

                        <div class="p-20">
                            <div class="">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ФИО сотрудника</th>
                                            <th>Должность</th>
                                            <th>Подразделение</th>
                                            <th>Дата увольнения</th>
                                            @can('action', Auth::user())<th>Табельщик</th>@endcan
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($dismassals as $dismissal)
                                            <tr>
                                                <td>{{$dismissal->myemployee->employee->employee}}</td>
                                                <td>{{$dismissal->myemployee->position->position}}</td>
                                                <td>{{$dismissal->myemployee->department->department}}</td>
                                                <td><a href="{{route('dismissal.edit', $dismissal->id)}}">{{$dismissal->date}}</a></td>
                                                @can('action', Auth::user())<td>{{$dismissal->user->name}}</td>@endcan
                                            </tr>
                                        @endforeach
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
