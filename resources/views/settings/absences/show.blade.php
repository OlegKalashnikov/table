@extends('layouts.app')

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/')}}">Главная</a>
        <a class="breadcrumb-item" href="{{route('breadcrumb.settings')}}">Настройки</a>
        <span class="breadcrumb-item active">Виды неявок</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Виды неявок</h5>
            <div>
                <a href="" data-toggle="modal" data-target="#modalcreate" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Новая запись</a>
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
            <div class="table-responsive">
                <table class="table mg-b-0">
                    <thead>
                    <tr>
                        <th>Вид неявки</th>
                        <th>Сокращение для табеля</th>
                        <th>Учитывать на праздниках и выходных</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($absences as $absence)
                        <tr>
                            <td>{{$absence->absence}}</td>
                            <td>{{$absence->reduction}}</td>
                            <td>{{$absence->holiday}}</td>
                            <td>
                                <a href="" data-toggle="modal" data-target="#modaledit" class="btn btn-outline-primary btn-icon" data-modalid="{{$absence->id}}" data-modalabsence="{{$absence->absence}}" data-modalholiday="{{$absence->holiday}}"><div><i class="fa fa-edit"></i></div></a>
                                <a href="" data-toggle="modal" data-target="#modaldestroy" class="btn btn-outline-danger btn-icon" data-modalid="{{$absence->id}}"><div><i class="fa fa-trash"></i></div></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- card -->

        <div id="modalcreate" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Создание нового вида неявки на работу</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pd-20">
                        <form action="{{route('settings.absence.store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="row row-xs">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Вид неявки:</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" name="absence" class="form-control">
                                </div>
                            </div><!-- row -->
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary pd-x-20">Создать</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Закрыть</button>
                    </div>
                    </form>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->

        <div id="modaledit" class="modal fade">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Редактирование вида неявки на работу</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pd-20">
                        <form action="{{route('settings.absence.update', 'absence')}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('patch')}}
                            <input type="hidden" name="id" id="id" value="">
                            <div class="row row-xs">
                                <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Вид неявки:</label>
                                <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                    <input type="text" name="absence" id="absence" class="form-control" value="">
                                </div>
                            </div><!-- row -->
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-primary pd-x-20">Обновить</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Закрыть</button>
                    </div>
                    </form>
                </div>
            </div><!-- modal-dialog -->
        </div><!-- modal -->


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
                        <form action="{{route('settings.absence.destroy', 'absence')}}" method="POST">
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
    <script>
        //Edit
        $('#modaledit').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('modalid');
            var absence = button.data('modalabsence');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
            modal.find('.modal-body #absence').val(absence);
        })

        $('#modaldestroy').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('modalid');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
        })
    </script>

@endsection