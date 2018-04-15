@extends('layouts.app')

@section('css-page')
    <!-- Plugins css-->
    <link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- DataTables -->
    <link href="{{asset('plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{asset('plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Plugins css-->
    <link href="{{asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/multiselect/css/multi-select.css')}}"  rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Plugins css -->
    <link href="{{asset('plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/mjolnic-bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <!-- Plugins css -->
    <link href="{{asset('plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/mjolnic-bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Список праздничных и предпраздничных дней</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('breadcrumb.settings')}}">Настройки</a></li>
                        <li class="breadcrumb-item active">Праздничные дни</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="row">
                        <div class="col-12 m-t-20">
                            <div class="p-20">
                                <div class="m-b-20">
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
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
                                    <button class="btn btn-outline-primary waves-effect waves-light" data-toggle="modal" data-target="#modalcreate"><i class="fa fa-plus"></i> добавить запись</button>
                                </div>
                                <table table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Тип дня</th>
                                        <th>Дата начала</th>
                                        <th>Дата конца</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($holidays as $holiday)
                                        <tr>
                                            <td>{{$id++}}</td>
                                            <td>
                                                @if($holiday->type == 1)
                                                    Предпраздничный день
                                                @elseif($holiday->type == 2)
                                                    Праздничный день
                                                @endif
                                            </td>
                                            <td>{{$holiday->date_from}}</td>
                                            <td>{{$holiday->date_before}}</td>
                                            <td>
                                                <button class="btn btn-outline-primary waves-effect waves-light" data-toggle="modal" data-target="#modaledit" data-modalid="{{$holiday->id}}" data-modaltype="{{$holiday->type}}" data-modaldate_from="{{$holiday->date_from}}" data-modaldate_before="{{$holiday->date_before}}"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#modaldestroy" data-modalid="{{$holiday->id}}"><i class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="modalcreate">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">Добавление данных</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('settings.holidays.store')}}" method="POST" id="create">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="" class="col-sm-4 form-control-label">Тип дня<span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select name="type" class="form-control select2" style="width: 100%">
                                    <option value="1">Предпраздничный день</option>
                                    <option value="2">Праздничный день</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Дата начала<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" name="date_from" class="form-control" placeholder="yyyy-mm-dd" id="datepicker-autoclose-from">
                                <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                            </div><!-- input-group -->
                        </div>
                        <div class="form-group">
                            <label for="pass1">Дата конца</label>
                            <div class="input-group">
                                <input type="text" name="date_before" class="form-control" placeholder="yyyy-mm-dd" id="datepicker-autoclose-before">
                                <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                            </div><!-- input-group -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="submit" form="create" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="modaledit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">Редактирование данных</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('settings.holidays.update', 'update')}}" method="POST" id="update">
                        {{csrf_field()}}
                        {{method_field('patch')}}
                        <input type="hidden" name="id" id="id" value="">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 form-control-label">Тип дня<span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select name="type" class="form-control select2" style="width: 100%" id="type">
                                    <option value="1">Предпраздничный день</option>
                                    <option value="2">Праздничный день</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Дата начала<span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="text" name="date_from" class="form-control" placeholder="yyyy-mm-dd" id="datepicker-autoclose-from-edit" value="">
                                <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                            </div><!-- input-group -->
                        </div>
                        <div class="form-group">
                            <label for="pass1">Дата конца</label>
                            <div class="input-group">
                                <input type="text" name="date_before" class="form-control" placeholder="yyyy-mm-dd" id="datepicker-autoclose-before-edit" value="">
                                <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                            </div><!-- input-group -->
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                    <button type="submit" form="update" class="btn btn-primary">Обновить</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="modaldestroy">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="mySmallModalLabel">Удаление данных</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Вы действительно хотите удалить эту запись?
                    </p>
                    <form action="{{route('settings.holidays.destroy', 'holiday')}}" method="POST" id="destroy">
                        {{csrf_field()}}
                        {{method_field('delete')}}
                        <input type="hidden" name="id" id="id" value="">
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
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
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
    <script src="{{asset('plugins/moment/moment.js')}}"></script>
    <script src="{{asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('plugins/mjolnic-bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('plugins/clockpicker/bootstrap-clockpicker.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <script src="{{asset('js/jquery.form-pickers.init.js')}}"></script>
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
    <script>
        $(document).ready(function () {
            // Select2
            $(".select2").select2();
        });
        {{--//Edit--}}
        $('#modaledit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('modalid');
            var type = button.data('modaltype');
            var date_from = button.data('modaldate_from');
            var date_before = button.data('modaldate_before');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #datepicker-autoclose-from-edit').val(date_from);
            modal.find('.modal-body #datepicker-autoclose-before-edit').val(date_before);
            modal.find('.modal-body #type').val(type).trigger('change');
        })

        $('#modaldestroy').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('modalid');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
        })

    </script>

@endsection