@extends('layouts.app')

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/')}}">Главная</a>
        <a class="breadcrumb-item" href="{{route('breadcrumb.settings')}}">Настройки</a>
        <span class="breadcrumb-item active">Графики</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Графики</h5>
            <div>
                <a href="" data-toggle="modal" data-target="#modalcreate" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Новый график</a>
            </div>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Общий список</h6>
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
            <div class="table-responsive">
                <table class="table mg-b-0">
                    <thead>
                    <tr>
                        <th>Графика</th>
                        <th>Категория</th>
                        <th>Продолжительность рабочего дня</th>
                        <th>Месячная норма на ставку</th>
                        @if(\App\User::role() == 1)
                            <th>Пользователь</th>
                        @endif
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($graphics as $graphic)
                        <tr>
                            <td>{{$graphic->name}}</td>
                            <td>{{$graphic->type->type}}</td>
                            <td>{{$graphic->working_hours}}</td>
                            <td>{{$graphic->monthly_rate}}</td>
                            @if(\App\User::role() == 1)
                                <th>{{$graphic->user->name}}</th>
                            @endif
                            <td>
                                @if(\App\User::role() == 1)
                                    <a href="" data-toggle="modal" data-target="#modaledit" class="btn btn-outline-primary btn-icon" data-modalid="{{$graphic->id}}" data-modaltype="{{$graphic->type_id}}"><div><i class="fa fa-edit"></i></div></a>
                                @endif
                                <a href="" data-toggle="modal" data-target="#modaldestroy" class="btn btn-outline-danger btn-icon" data-modalid="{{$graphic->id}}"><div><i class="fa fa-trash"></i></div></a>
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
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Создание нового типа графиков</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body pd-20">
                        <div class="row row-sm mg-t-20">
                            <form action="{{route('settings.graphic.store')}}" method="POST" id="graphic">
                                {{csrf_field()}}
                                <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                                    <div class="row">
                                        <label class="col-sm-4 form-control-label">Наименование: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="text" name="name" class="form-control" placeholder="Например: апрель 2018">
                                        </div>
                                    </div><!-- row -->
                                    <div class="row mg-t-20">
                                        <label class="col-sm-4 form-control-label">Продолжительность рабочего дня: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="text" name="working_hours" class="form-control" placeholder="Например: 8, 6:19">
                                        </div>
                                    </div>
                                    <div class="row mg-t-20">
                                        <label class="col-sm-4 form-control-label">Начало рабочего дня: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="text" name="from" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mg-t-20">
                                        <label class="col-sm-4 form-control-label">Конец рабочего дня: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="text" name="before" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mg-t-20">
                                        <label class="col-sm-4 form-control-label">Месячная норма на ставку: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <input type="text" name="monthly_rate" class="form-control" placeholder="Например: 148">
                                        </div>
                                    </div>
                                    <div class="row mg-t-20">
                                        <label class="col-sm-4 form-control-label">Категория: <span class="tx-danger">*</span></label>
                                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                            <select name="type_id" id="type_id" class="custom-select">
                                                <option value="">Выберите категорию</option>
                                                @foreach($types as $type)
                                                    <option value="{{$type->id}}">{{$type->type}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div><!-- card -->
                            </form>
                        </div><!-- col-6 -->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="graphic" class="btn btn-info pd-x-20">Создать</button>
                        <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Закрыть</button>
                    </div>
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
                        <form action="{{route('settings.graphic.destroy', 'graphic')}}" method="POST">
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
        $('#modaldestroy').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('modalid');
            var name = button.data('modalname');
            var modal = $(this);
            modal.find('.modal-body #id').val(id);
        })
    </script>

@endsection
