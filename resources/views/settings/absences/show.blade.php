@extends('layouts.app')

@section('css-page')
    <!-- Plugins css-->
    <link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Виды неявок</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Настройки</a></li>
                        <li class="breadcrumb-item active">Виды неявок</li>
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
                                    <button class="btn btn-outline-primary waves-effect waves-light" data-toggle="modal" data-target="#modalcreate"><i class="fa fa-plus"></i> добавить запись</button>
                                </div>
                                <table class="table table-bordered table-responsive">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Вид неявки</th>
                                        <th>Сокращение для табеля</th>
                                        <th>Учитывать на праздниках</th>
                                        <th>Действия</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $id=1;?>
                                    @foreach($absences as $absence)
                                        <tr>
                                            <td>{{$id++}}</td>
                                            <td>{{$absence->absence}}</td>
                                            <td>{{$absence->reduction}}</td>
                                            <td>
                                                @if($absence->holiday)
                                                    Да
                                                @else
                                                    Нет
                                                @endif
                                            </td>
                                            <td>
                                                <button class="btn btn-outline-primary waves-effect waves-light" data-toggle="modal" data-target="#modaledit" data-modalid="{{$absence->id}}" data-modalabsence="{{$absence->absence}}" data-modalholiday="{{$absence->holiday}}" data-modalreduction="{{$absence->reduction}}"><i class="fa fa-edit"></i></button>
                                                <button class="btn btn-outline-danger waves-effect waves-light" data-toggle="modal" data-target="#modaldestroy" data-modalid="{{$absence->id}}"><i class="fa fa-trash"></i></button>
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
                    <form action="{{route('settings.absence.store')}}" method="POST" id="create">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="" class="col-sm-4 form-control-label">Вид неявки<span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="absence">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 form-control-label">Сокращение<span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="reduction">
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <label for="" class="col-sm-4 form-control-label">Учитывать на праздниках<span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select name="holiday" class="form-control select2" style="width: 100%">
                                    <option value="1">Да</option>
                                    <option value="0">Нет</option>
                                </select>
                            </div>
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
                    <form action="{{route('settings.absence.update', 'update')}}" method="POST" id="update">
                        {{csrf_field()}}
                        {{method_field('patch')}}
                        <input type="hidden" name="id" id="id" value="">
                        <div class="form-group row">
                            <label for="" class="col-sm-4 form-control-label">Вид неявки<span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="absence" id="absence" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 form-control-label">Сокращение<span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="reduction" id="reduction" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 form-control-label">Учитывать на праздниках<span class="text-danger">*</span></label>
                            <div class="col-sm-7">
                                <select name="holiday" class="form-control select2" style="width: 100%" id="holiday">
                                    <option value="1">Да</option>
                                    <option value="0">Нет</option>
                                </select>
                            </div>
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
                    <form action="{{route('settings.absence.destroy', 'absence')}}" method="POST" id="destroy">
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
@endsection

@section('js-page')
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
    {{--<script type="text/javascript" src="{{asset('js/jquery.formadvanced.init.js')}}"></script>--}}
    <script>
        $(document).ready(function () {
            // Select2
            $(".select2").select2();
        });
        {{--//Edit--}}
        $('#modaledit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('modalid');
            var absence = button.data('modalabsence');
            var holiday = button.data('modalholiday');
            var reduction = button.data('modalreduction');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #absence').val(absence);
            modal.find('.modal-body #reduction').val(reduction);
            modal.find('.modal-body #holiday').val(holiday).trigger('change');
        })

        $('#modaldestroy').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('modalid');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
        })

    </script>

@endsection




{{--@extends('layouts.app')--}}

{{--@section('css-page')--}}
    {{--<!-- vendor css -->--}}
    {{--<link href="{{asset('css/jquery.dataTables.css')}}" rel="stylesheet">--}}
    {{--<link href="{{asset('css/select2.min.css')}}" rel="stylesheet">--}}
{{--@endsection--}}

{{--@section('content')--}}
    {{--<nav class="breadcrumb sl-breadcrumb">--}}
        {{--<a class="breadcrumb-item" href="{{url('/')}}">Главная</a>--}}
        {{--<a class="breadcrumb-item" href="{{route('breadcrumb.settings')}}">Настройки</a>--}}
        {{--<span class="breadcrumb-item active">Виды неявок</span>--}}
    {{--</nav>--}}

    {{--<div class="sl-pagebody">--}}
        {{--<div class="sl-page-title">--}}
            {{--<h5>Виды неявок</h5>--}}
            {{--<div>--}}
                {{--<a href="" data-toggle="modal" data-target="#modalcreate" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Новая запись</a>--}}
            {{--</div>--}}
        {{--</div><!-- sl-page-title -->--}}

        {{--<div class="card pd-20 pd-sm-40">--}}
            {{--<h6 class="card-body-title">Общий список</h6>--}}
            {{--@if (count($errors) > 0)--}}
                {{--<div class="alert alert-danger">--}}
                    {{--<ul>--}}
                        {{--@foreach ($errors->all() as $error)--}}
                            {{--<li>{{ $error }}</li>--}}
                        {{--@endforeach--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--@endif--}}
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
            {{--<div class="table-responsive">--}}
                {{--<table class="table mg-b-0">--}}
                    {{--<thead>--}}
                    {{--<tr>--}}
                        {{--<th>Вид неявки</th>--}}
                        {{--<th>Сокращение для табеля</th>--}}
                        {{--<th>Учитывать на праздниках</th>--}}
                        {{--<th>Действия</th>--}}
                    {{--</tr>--}}
                    {{--</thead>--}}
                    {{--<tbody>--}}
                    {{--@foreach($absences as $absence)--}}
                        {{--<tr>--}}
                            {{--<td>{{$absence->absence}}</td>--}}
                            {{--<td>{{$absence->reduction}}</td>--}}
                            {{--<td>--}}
                                {{--@if($absence->holiday)--}}
                                    {{--Да--}}
                                {{--@else--}}
                                    {{--Нет--}}
                                {{--@endif--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<a href="" data-toggle="modal" data-target="#modaledit" class="btn btn-outline-primary btn-icon" data-modalid="{{$absence->id}}" data-modalabsence="{{$absence->absence}}" data-modalholiday="{{$absence->holiday}}" data-modalreduction="{{$absence->reduction}}"><div><i class="fa fa-edit"></i></div></a>--}}
                                {{--<a href="" data-toggle="modal" data-target="#modaldestroy" class="btn btn-outline-danger btn-icon" data-modalid="{{$absence->id}}"><div><i class="fa fa-trash"></i></div></a>--}}
                            {{--</td>--}}
                        {{--</tr>--}}
                    {{--@endforeach--}}
                    {{--</tbody>--}}
                {{--</table>--}}
            {{--</div>--}}
        {{--</div><!-- card -->--}}

    {{--<div id="modalcreate" class="modal fade">--}}
        {{--<div class="modal-dialog modal-lg" role="document">--}}
            {{--<div class="modal-content tx-size-sm">--}}
                {{--<div class="modal-header pd-x-20">--}}
                    {{--<h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Создание нового вида неявки на работу</h6>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body pd-20">--}}
                    {{--<form action="{{route('settings.absence.store')}}" method="POST">--}}
                        {{--{{csrf_field()}}--}}
                        {{--<div class="form-layout">--}}
                            {{--<div class="row mg-b-25">--}}
                                {{--<div class="col-lg-4">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label class="form-control-label">Вид неявки: <span class="tx-danger">*</span></label>--}}
                                        {{--<input class="form-control" type="text" name="absence">--}}
                                    {{--</div>--}}
                                {{--</div><!-- col-4 -->--}}
                                {{--<div class="col-lg-4">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label class="form-control-label">Сокращение: <span class="tx-danger">*</span></label>--}}
                                        {{--<input class="form-control" type="text" name="reduction">--}}
                                    {{--</div>--}}
                                {{--</div><!-- col-4 -->--}}
                                {{--<div class="col-lg-8">--}}
                                    {{--<div class="form-group mg-b-10-force">--}}
                                        {{--<label class="ckbox">--}}
                                            {{--<input type="checkbox" name="holiday" value="1"><span>Учитывать на праздниках</span>--}}
                                        {{--</label>--}}
                                    {{--</div>--}}
                                {{--</div><!-- col-8 -->--}}
                            {{--</div><!-- row -->--}}
                            {{--<div class="form-layout-footer">--}}
                                {{--<button type="submit" class="btn btn-primary mg-r-5">Добавить</button>--}}
                                {{--<button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Закрыть</button>--}}
                            {{--</div><!-- form-layout-footer -->--}}
                        {{--</div><!-- form-layout -->--}}
                    {{--</form>--}}
                {{--</div><!-- modal-body -->--}}
            {{--</div>--}}
        {{--</div><!-- modal-dialog -->--}}
    {{--</div><!-- modal -->--}}

    {{--<div id="modaledit" class="modal fade">--}}
        {{--<div class="modal-dialog modal-lg" role="document">--}}
            {{--<div class="modal-content tx-size-sm">--}}
                {{--<div class="modal-header pd-x-20">--}}
                    {{--<h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Создание нового вида неявки на работу</h6>--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                        {{--<span aria-hidden="true">&times;</span>--}}
                    {{--</button>--}}
                {{--</div>--}}
                {{--<div class="modal-body pd-20">--}}
                    {{--<form action="{{route('settings.absence.update', 'absence')}}" method="POST">--}}
                        {{--{{csrf_field()}}--}}
                        {{--{{method_field('patch')}}--}}
                        {{--<input type="hidden" name="id" id="id" value="">--}}
                        {{--<div class="form-layout">--}}
                            {{--<div class="row mg-b-25">--}}
                                {{--<div class="col-lg-4">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label class="form-control-label">Вид неявки: <span class="tx-danger">*</span></label>--}}
                                        {{--<input class="form-control" type="text" name="absence" id="absence" value="">--}}
                                    {{--</div>--}}
                                {{--</div><!-- col-4 -->--}}
                                {{--<div class="col-lg-4">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label class="form-control-label">Сокращение: <span class="tx-danger">*</span></label>--}}
                                        {{--<input class="form-control" type="text" name="reduction" id="reduction" value="">--}}
                                    {{--</div>--}}
                                {{--</div><!-- col-4 -->--}}
                                {{--<div class="col-lg-4">--}}
                                    {{--<div class="form-group">--}}
                                        {{--<label class="form-control-label">Учитывать на праздниках: <span class="tx-danger">*</span></label>--}}
                                        {{--<select class="form-control select2" name="holiday" id="holiday">--}}
                                            {{--<option value="1">Да</option>--}}
                                            {{--<option value="0">Нет</option>--}}
                                        {{--</select>--}}
                                    {{--</div>--}}
                                {{--</div><!-- col-8 -->--}}
                            {{--</div><!-- row -->--}}
                            {{--<div class="form-layout-footer">--}}
                                {{--<button type="submit" class="btn btn-primary mg-r-5">Обновить</button>--}}
                                {{--<button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Закрыть</button>--}}
                            {{--</div><!-- form-layout-footer -->--}}
                        {{--</div><!-- form-layout -->--}}
                    {{--</form>--}}
                {{--</div><!-- modal-body -->--}}
            {{--</div>--}}
        {{--</div><!-- modal-dialog -->--}}
    {{--</div><!-- modal -->--}}

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
                    {{--<form action="{{route('settings.absence.destroy', 'absence')}}" method="POST">--}}
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
{{--@endsection--}}

{{--@section('js-page')--}}
    {{--<script src="{{asset('js/select2.min.js')}}"></script>--}}

    {{--<script>--}}
        {{--// Select2--}}
        {{--//$('.select2').select2();--}}
        {{--//Edit--}}
        {{--$('#modaledit').on('show.bs.modal', function (event) {--}}
            {{--var button = $(event.relatedTarget);--}}
            {{--var id = button.data('modalid');--}}
            {{--var absence = button.data('modalabsence');--}}
            {{--var holiday = button.data('modalholiday');--}}
            {{--var reduction = button.data('modalreduction');--}}
            {{--var modal = $(this);--}}
            {{--modal.find('.modal-body #id').val(id);--}}
            {{--modal.find('.modal-body #absence').val(absence);--}}
            {{--modal.find('.modal-body #reduction').val(reduction);--}}
            {{--modal.find('.modal-body #holiday').val(holiday).trigger('change');--}}
        {{--})--}}

        {{--$('#modaldestroy').on('show.bs.modal', function (event) {--}}
            {{--var button = $(event.relatedTarget);--}}
            {{--var id = button.data('modalid');--}}
            {{--var modal = $(this);--}}
            {{--modal.find('.modal-body #id').val(id);--}}
        {{--})--}}
    {{--</script>--}}

{{--@endsection--}}