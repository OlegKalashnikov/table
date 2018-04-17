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

    <!--Form Wizard-->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/jquery.steps/demo/css/jquery.steps.css')}}" />
@endsection

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Список помесячных графиков</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('graphic')}}">Графики</a></li>
                        <li class="breadcrumb-item active">Графики</li>
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
                        <form id="wizard-vertical" action="{{route('graphic.store.other')}}" method="POST">
                            {{csrf_field()}}
                            <h3>Основные данные</h3>
                            <section>
                                <div class="form-group row">
                                    <label class="col-lg-3 control-label " for="">Название графика <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <input type="text" name="name" placeholder="Например: врачи апрель 2018" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 control-label " for=""> Месяц <span class="text-danger">*</span></label>
                                    <div class="col-lg-9">
                                        <select name="month" class="form-controll select2" style="width: 100%">
                                            <option value="1" @if($month == 1) selected @endif>Январь</option>
                                            <option value="2" @if($month == 2) selected @endif>Февраль</option>
                                            <option value="3" @if($month == 3) selected @endif>Март</option>
                                            <option value="4" @if($month == 4) selected @endif>Апрель</option>
                                            <option value="5" @if($month == 5) selected @endif>Май</option>
                                            <option value="6" @if($month == 6) selected @endif>Июнь</option>
                                            <option value="7" @if($month == 7) selected @endif>Июль</option>
                                            <option value="8" @if($month == 8) selected @endif>Август</option>
                                            <option value="9" @if($month == 9) selected @endif>Сентябрь</option>
                                            <option value="10" @if($month == 10) selected @endif>Октябрь</option>
                                            <option value="11" @if($month == 11) selected @endif>Ноябрь</option>
                                            <option value="12" @if($month == 12) selected @endif>Декабрь</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-3 form-control-label">Сотрудники
                                        <span class="text-danger">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="myemployees[]" class="multi-select" multiple="" id="my_multi_select3" >
                                            @foreach($myemployees as $myemployee)
                                                <option value="{{$myemployee->id}}">{{$myemployee->employee->employee}} - {{$myemployee->position->position}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </section>
                            <h3>Норма часов</h3>
                            <section>
                                <div class="form-group row">
                                    <label for="" class="col-lg-4 form-control-label">Месячная норма часов на ставку<span class="text-danger">*</span></label>
                                    <div class="col-lg-8">
                                        <input name="monthly_rate_of_hours" type="text" placeholder=""
                                               class="form-control">
                                    </div>
                                </div>
                            </section>
                            <h3>График</h3>
                            <section>
                                <div class="form-group row">
                                    <label class="col-sm-4 form-control-label">Начало рабочего дня<span class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <div class="input-group ">
                                            <input type="text" name="from" data-mask="99:99"  class="form-control">
                                            <span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>
                                        </div>
                                        <span class="font-13 text-muted m-b-20">ЧЧ:ММ</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hori-pass1" class="col-sm-4 form-control-label">Конец рабочего дня на ставку<span class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <div class="input-group ">
                                            <input type="text" name="before" data-mask="99:99"  class="form-control">
                                            <span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>
                                        </div>
                                        <span class="font-13 text-muted m-b-20">ЧЧ:ММ</span>
                                    </div>
                                </div>
                            </section>
                            <h3>Табель</h3>
                            <section>
                                <div class="form-group row">
                                    <label class="col-sm-4 form-control-label">Часов в день на ставку<span class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <div class="input-group ">
                                            <input type="text" name="hours_per_day" data-mask="99:99"  class="form-control">
                                            <span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>
                                        </div>
                                        <span class="font-13 text-muted m-b-20">ЧЧ:ММ</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-4 form-control-label">Кол-во рабочих дней<span class="text-danger">*</span></label>
                                    <div class="col-sm-7">
                                        <input type="text" name="number_of_working_days" placeholder="Например: 21" class="form-control">
                                    </div>
                                </div>
                            </section>
                        </form>
                        <!-- End #wizard-vertical -->
                        {{--<form action="{{route('graphic.store.other')}}" method="POST">--}}
                            {{--{{csrf_field()}}--}}
                            {{--<div class="form-group row">--}}
                                {{--<label class="col-sm-4 form-control-label">Название графика<span class="text-danger">*</span></label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<input type="text" name="name" placeholder="Например: врачи апрель 2018" class="form-control">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group row">--}}
                                {{--<label class="col-sm-4 form-control-label">Месяц<span class="text-danger">*</span></label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<select name="month" class="form-controll select2" style="width: 100%">--}}
                                        {{--<option value="1" @if($month == 1) selected @endif>Январь</option>--}}
                                        {{--<option value="2" @if($month == 2) selected @endif>Февраль</option>--}}
                                        {{--<option value="3" @if($month == 3) selected @endif>Март</option>--}}
                                        {{--<option value="4" @if($month == 4) selected @endif>Апрель</option>--}}
                                        {{--<option value="5" @if($month == 5) selected @endif>Май</option>--}}
                                        {{--<option value="6" @if($month == 6) selected @endif>Июнь</option>--}}
                                        {{--<option value="7" @if($month == 7) selected @endif>Июль</option>--}}
                                        {{--<option value="8" @if($month == 8) selected @endif>Август</option>--}}
                                        {{--<option value="9" @if($month == 9) selected @endif>Сентябрь</option>--}}
                                        {{--<option value="10" @if($month == 10) selected @endif>Октябрь</option>--}}
                                        {{--<option value="11" @if($month == 11) selected @endif>Ноябрь</option>--}}
                                        {{--<option value="12" @if($month == 12) selected @endif>Декабрь</option>--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group row">--}}
                                {{--<label class="col-sm-4 form-control-label">Часов в день<span class="text-danger">*</span></label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<div class="input-group ">--}}
                                        {{--<input type="text" name="hours_per_day" data-mask="99:99"  class="form-control">--}}
                                        {{--<span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>--}}
                                    {{--</div>--}}
                                    {{--<span class="font-13 text-muted m-b-20">ЧЧ:ММ</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group row">--}}
                                {{--<label class="col-sm-4 form-control-label">Кол-во рабочих дней<span class="text-danger">*</span></label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<input type="text" name="number_of_working_days" placeholder="Например: 21" class="form-control">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group row">--}}
                                {{--<label class="col-sm-4 form-control-label">Начало рабочего дня<span class="text-danger">*</span></label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<div class="input-group ">--}}
                                        {{--<input type="text" name="from" data-mask="99:99"  class="form-control">--}}
                                        {{--<span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>--}}
                                    {{--</div>--}}
                                    {{--<span class="font-13 text-muted m-b-20">ЧЧ:ММ</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group row">--}}
                                {{--<label for="hori-pass1" class="col-sm-4 form-control-label">Конец рабочего дня<span class="text-danger">*</span></label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<div class="input-group ">--}}
                                        {{--<input type="text" name="before" data-mask="99:99"  class="form-control">--}}
                                        {{--<span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>--}}
                                    {{--</div>--}}
                                    {{--<span class="font-13 text-muted m-b-20">ЧЧ:ММ</span>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group row">--}}
                                {{--<label for="" class="col-sm-4 form-control-label">Месячная норма часов на ставку</label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<input name="monthly_rate_of_hours_01" type="text" placeholder=""--}}
                                           {{--class="form-control">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group row">--}}
                                {{--<label for="" class="col-sm-4 form-control-label">Месячная норма часов на 0.75 ставки</label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<input name="monthly_rate_of_hours_075" type="text" placeholder=""--}}
                                           {{--class="form-control">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group row">--}}
                                {{--<label for="" class="col-sm-4 form-control-label">Месячная норма часов на 0.5 ставки</label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<input name="monthly_rate_of_hours_05" type="text" placeholder=""--}}
                                           {{--class="form-control">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group row">--}}
                                {{--<label for="" class="col-sm-4 form-control-label">Месячная норма часов на 0.25 ставки</label>--}}
                                {{--<div class="col-sm-7">--}}
                                    {{--<input name="monthly_rate_of_hours_025" type="text" placeholder=""--}}
                                           {{--class="form-control">--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="form-group row">--}}
                                {{--<label for="" class="col-sm-4 form-control-label">Сотрудники--}}
                                    {{--<span class="text-danger">*</span></label>--}}
                                {{--<div class="col-sm-8">--}}
                                    {{--<select name="myemployees[]" class="multi-select" multiple="" id="my_multi_select3" >--}}
                                        {{--@foreach($myemployees as $myemployee)--}}
                                            {{--<option value="{{$myemployee->id}}">{{$myemployee->employee->employee}} - {{$myemployee->position->position}}</option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="form-group row">--}}
                                {{--<div class="col-12">--}}
                                    {{--<button type="submit" class="btn btn-outline-primary waves-effect waves-light">--}}
                                        {{--Сохранить--}}
                                    {{--</button>--}}
                                    {{--<a href="{{route('graphic')}}" class="btn btn-outline-primary waves-effect m-l-5">--}}
                                        {{--Сохранить и заполнить--}}
                                    {{--</a>--}}

                                    {{--<a href="{{route('graphic')}}" class="btn btn-outline-secondary waves-effect m-l-5">--}}
                                        {{--Назад--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</form>--}}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('js-page')
    <!--Form Wizard-->
    <script src="{{asset('plugins/jquery.steps/build/jquery.steps.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>

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

    <!--wizard initialization-->
    <script src="{{asset('js/jquery.wizard-init.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/bootstrap-inputmask/bootstrap-inputmask.min.js')}}" type="text/javascript"></script>
@endsection