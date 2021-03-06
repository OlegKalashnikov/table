@extends('layouts.app')

@section('css-page')

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

@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">График</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('graphic')}}">Графики</a></li>
                        <li class="breadcrumb-item active">Создание графика</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">

                    <h4 class="header-title m-t-0">Добавление данных</h4>
                    <p class="text-muted font-13 m-b-10">
                        Внесите данные для автоматического формирования табеля и графика.
                    </p>

                    <div class="p-20">
                        <form role="form" action="{{route('graphic.store')}}" method="POST" data-parsley-validate novalidate>
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label class="col-sm-4 form-control-label">Название графика<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" name="name" placeholder="Например: апрель врачи 2018" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 form-control-label">Месяц<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <select name="month" class="form-controll select2" style="width: 100%">
                                        <option value="1">Январь</option>
                                        <option value="2">Февраль</option>
                                        <option value="3">Март</option>
                                        <option value="4">Апрель</option>
                                        <option value="5">Май</option>
                                        <option value="6">Июнь</option>
                                        <option value="7">Июль</option>
                                        <option value="8">Август</option>
                                        <option value="9">Сентябрь</option>
                                        <option value="10">Октябрь</option>
                                        <option value="11">Ноябрь</option>
                                        <option value="12">Декабрь</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 form-control-label">Часов в день<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" name="hours_per_day" placeholder="Например: 8:00 или 6:19" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 form-control-label">Кол-во рабочих дней<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input type="text" name="number_of_working_days" placeholder="Например: 21" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 form-control-label">Начало рабочего дня<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <div class="input-group clockpicker m-b-20" data-placement="top" data-align="top" data-autoclose="true">
                                        <input type="text" class="form-control" value="08:00" name="from">
                                        <span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hori-pass1" class="col-sm-4 form-control-label">Конец рабочего дня<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input id="hori-pass1" type="text" name="before" placeholder="Password"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hori-pass1" class="col-sm-4 form-control-label">Месячная норма часов на ставку<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <input id="hori-pass1" name="monthly_rate_of_hours" type="text" placeholder=""
                                           class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hori-pass2" class="col-sm-4 form-control-label">Сотрудники
                                    <span class="text-danger">*</span></label>
                                <div class="col-sm-8">
                                    <select name="myemployees[]" class="multi-select" multiple="" id="my_multi_select3" >
                                        @foreach($myemployees as $myemployee)
                                            <option value="{{$myemployee->id}}">{{$myemployee->employee->employee}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Сохранить
                                    </button>
                                    <button type="reset"
                                            class="btn btn-secondary waves-effect m-l-5">
                                        Cancel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div><!-- end col-->

        </div>
        <!-- end row -->


    </div>
@endsection

@section('js-page')
    <script src="{{asset('plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/multiselect/js/jquery.multi-select.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/jquery-quicksearch/jquery.quicksearch.js')}}"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>

    <script src="{{asset('plugins/moment/moment.js')}}"></script>
    <script src="{{asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('plugins/mjolnic-bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('plugins/clockpicker/bootstrap-clockpicker.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- Autocomplete -->
    <script type="text/javascript" src="{{asset('plugins/autocomplete/jquery.mockjax.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/autocomplete/jquery.autocomplete.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/autocomplete/countries.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.autocomplete.init.js')}}"></script>

    <script type="text/javascript" src="{{asset('js/jquery.formadvanced.init.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.form-pickers.init.js')}}"></script>
@endsection