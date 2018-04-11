@extends('layouts.app')

@section('css-page')
    <!-- Plugins css-->
    <link href="{{asset('plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')}}" rel="stylesheet" />
    <link href="{{asset('plugins/multiselect/css/multi-select.css')}}"  rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Формирование списка сотрудников закрепленных за вами</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('my.employee')}}">Сотрудники</a></li>
                        <li class="breadcrumb-item active">Добавление сотрудников</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">

            <div class="col-xl-6 mg-t-25 mg-xl-t-0">

                <div class="card-box">
                    <h4 class="header-title m-t-0">Добавление сотрудника</h4>
                    <p class="text-muted font-13 m-b-10">
                        Сформируйте список сотрудников для которых вам нужно составлять табель и график для сдачи в расчетную группу
                    </p>

                    <div class="p-20">
                        <form role="form" action="{{route('my.employee.store')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <label for="employee_id" class="col-sm-4 form-control-label">ФИО сотрудника:<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <select id="employee_id" class="form-control select2-show-search{{ $errors->has('employee_id') ? ' is-invalid' : '' }}" name="employee_id">
                                        <option value="">Выберите сотрудника</option>
                                        @foreach($employees as $employee)
                                            <option value="{{$employee->id}}">{{$employee->employee}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('employee_id'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('employee_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hori-pass1" class="col-sm-4 form-control-label">Должность<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <select class="form-control select2-show-search{{ $errors->has('position_id') ? ' is-invalid' : '' }}" name="position_id">
                                        <option value="">Выберите должность</option>
                                        @foreach($positions as $position)
                                            <option value="{{$position->id}}">{{$position->position}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('position_id'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('position_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hori-pass2" class="col-sm-4 form-control-label">Подразделение
                                    <span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <select class="form-control select2-show-search{{ $errors->has('department_id') ? ' is-invalid' : '' }}" name="department_id">
                                        <option value="">Выберите подразделение</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->department}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('department_id'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('department_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="webSite" class="col-sm-4 form-control-label">Ставка<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <select class="form-control select2{{ $errors->has('department_id') ? ' is-invalid' : '' }}" name="rate">
                                        <option value="">Выберите ставку</option>
                                        <option value="1">1</option>
                                        <option value="0.75">0.75</option>
                                        <option value="0.5">0.5</option>
                                        <option value="0.25">0.25</option>
                                    </select>
                                    @if ($errors->has('rate'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('rate') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Добавить
                                    </button>
                                    <a href="{{route('my.employee')}}" class="btn btn-secondary waves-effect m-l-5">Назад</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>

            <div class="col-xl-6">
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">ФИО сотрудника</th>
                            <th class="wd-15p">Должность</th>
                            <th class="wd-15p">Подразделение</th>
                            <th class="wd-15p">Ставка</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($myEmployees as $myEmployee)
                            <tr>
                                <td>{{$myEmployee->employee->employee}}</td>
                                <td>{{$myEmployee->position->position}}</td>
                                <td>{{$myEmployee->department->department}}</td>
                                <td>{{$myEmployee->rate}}</td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div>

        </div>

    </div>




@endsection

@section('js-page')
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.js')}}"></script>

    <script>
        $(function(){
            'use strict';

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Поиск...',
                    sSearch: '',
                    lengthMenu: '_MENU_ записей/на странице',
                }
            });

            $('.select2').select2({
                minimumResultsForSearch: Infinity
            });
            // Select2
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

            // Select2 by showing the search
            $('.select2-show-search').select2({
                minimumResultsForSearch: ''
            });
        });
    </script>
@endsection