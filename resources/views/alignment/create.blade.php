@extends('layouts.app')

@section('css-page')
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
                    <h4 class="page-title float-left">Добавление сотрудников работающих по совмещению</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Главная</a></li>
                        <li class="breadcrumb-item active">Совмещения</li>
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
                        <div class="col-sm-12 col-xs-12 col-md-6">

                            <h4 class="header-title m-t-0">Добавление данных</h4>
                            <p class="text-muted font-13 m-b-10">
                                Выберите сотрудника из списка и укажите период совмещения и процент
                            </p>

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @if(Session::has('success'))
                                <div class="alert alert-success"><span class="glyphicon glyphicon-ok"></span><em> {{ session('success') }}</em></div>
                            @endif

                            <div class="p-20">
                                <form action="{{route('alignment.store')}}" method="POST" data-parsley-validate novalidate>
                                    {{csrf_field()}}
                                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                                    <div class="form-group">
                                        <label>Сотрудник<span class="text-danger">*</span></label>
                                        <select id="myemployee_id" class="form-control select2-show-search{{ $errors->has('employee_id') ? ' is-invalid' : '' }}" name="myemployee_id">
                                            <option value="">Выберите сотрудника</option>
                                            @foreach($myemployees as $employee)
                                                <option value="{{$employee->id}}">{{$employee->employee->employee}} - {{$employee->position->position}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('employee_id'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('employee_id') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="emailAddress">Проценты<span class="text-danger">*</span></label>
                                        <input type="text" name="percentages" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="emailAddress">Дата с которой сотрудник совмещает<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" name="from" class="form-control" placeholder="yyyy-mm-dd" id="datepicker-autoclose-from">
                                            <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                                        </div><!-- input-group -->
                                    </div>
                                    <div class="form-group">
                                        <label for="pass1">Дата по которую сотрудник совмещает<span class="text-danger">*</span></label>
                                        <div class="input-group">
                                            <input type="text" name="before" class="form-control" placeholder="yyyy-mm-dd" id="datepicker-autoclose-before">
                                            <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                                        </div><!-- input-group -->
                                    </div>

                                    <div class="form-group text-right m-b-0">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">
                                            Добавить
                                        </button>
                                        <a href="{{route('alignment')}}" class="btn btn-secondary waves-effect m-l-5">
                                            Назад
                                        </a>
                                    </div>

                                </form>
                            </div>

                        </div>


                    </div>
                    <!-- end row -->


                </div>

                @endsection

                @section('js-page')
                    <script src="{{asset('plugins/moment/moment.js')}}"></script>
                    <script src="{{asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
                    <script src="{{asset('plugins/mjolnic-bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
                    <script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
                    <script src="{{asset('plugins/clockpicker/bootstrap-clockpicker.js')}}"></script>
                    <script src="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

                    <script src="{{asset('js/jquery.form-pickers.init.js')}}"></script>
@endsection