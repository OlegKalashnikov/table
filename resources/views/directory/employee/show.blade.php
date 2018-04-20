@extends('layouts.app')

@section('css-page')
    <!-- DataTables -->
    <link href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert css -->
    <link href="{{asset('plugins/bootstrap-sweetalert/sweet-alert.css')}}" rel="stylesheet" type="text/css" />

    <!-- Switchery css -->
    <link href="{{asset('plugins/switchery/switchery.min.css')}}" rel="stylesheet" />
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Список сотрудников организации</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="#">Справочники</a></li>
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
                        Список всех сотрудников организации
                    </p>
                    <div class="m-b-30">
                        @can('action', Auth::user())
                        <a href="{{route('directory.employee.create')}}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Создание сотрудника</a>
                        <a href="{{route('directory.employee.upload')}}" class="btn btn-outline-primary"><i class="fa fa-upload"></i> Импорт данных</a>
                        @endcan
                    </div>
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ФИО сотрудника</th>
                                @can('action', Auth::user())<th>Действия</th>@endcan
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($employees as $employee)
                            <tr>
                                <td>{{$employee->employee}}</td>
                                @can('action', Auth::user())
                                <td>
                                    <a href="{{route('directory.employee.edit', ['id' => $employee->id])}}" class="btn btn-outline-primary"> <i class="fa fa-edit"></i> </a>
                                    <button class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-sm" data-modalid="{{$employee->id}}"><i class="fa fa-trash"></i></button>
                                </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end row -->
        <!-- Modal -->
        <div class="modal fade bs-example-modal-sm" id="modaldestroy" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="mySmallModalLabel">Удаление записи</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Вы действительно хотите удалить эту запись?</p>
                        <form action="{{route('directory.employee.destroy', 'employee')}}" method="POST" id="destroy">
                            {{method_field('delete')}}
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="" id="id">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" form="destroy" class="btn btn-danger">Удалить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-page')
    <!-- Required datatable js -->
    <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Sweet Alert js -->
    <script src="{{asset('plugins/bootstrap-sweetalert/sweet-alert.min.js')}}"></script>
    <script src="{{asset('js/jquery.sweet-alert.init.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();
        } );
    </script>
    <script>
        $('#modaldestroy').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('modalid');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
        })
    </script>
@endsection