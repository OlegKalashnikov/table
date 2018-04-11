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
                    <h4 class="page-title float-left">Редактирование сотрудников закрепленных за вами</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('my.employee')}}">Сотрудники</a></li>
                        <li class="breadcrumb-item active">Редактирование сотрудника</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">

            <div class="col-xl-6 mg-t-25 mg-xl-t-0">

                <div class="card-box">
                    <h4 class="header-title m-t-0">Редактирование сотрудника</h4>

                    <div class="p-20">
                        <form role="form" action="{{route('my.employee.update', $myEmployees->id)}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('patch')}}
                            <div class="form-group row">
                                <label for="employee_id" class="col-sm-4 form-control-label">ФИО сотрудника:<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <select id="employee_id" class="form-control select2-show-search{{ $errors->has('employee_id') ? ' is-invalid' : '' }}" name="employee_id">
                                        @foreach($employees as $employee)
                                            <option value="{{$employee->id}}" @if($employee->id == $myEmployees->employee_id) selected @endif>{{$employee->employee}}</option>
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
                                            <option value="{{$position->id}}" @if($position->id == $myEmployees->position_id) selected @endif>{{$position->position}}</option>
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



        </div>

    </div>


                    <form action="" method="POST">
                        {{csrf_field()}}

                        <div class="row row-xs">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>ФИО сотрудника:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <select class="form-control select2-show-search{{ $errors->has('employee_id') ? ' is-invalid' : '' }}" name="employee_id">
                                    <option value="">Выберите сотрудника</option>
                                    @foreach($employees as $employee)
                                        <option value="{{$employee->id}}" @if($employee->id == $myEmployees->employee_id) selected @endif>{{$employee->employee}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('employee_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('employee_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><!-- row -->
                        <div class="row row-xs mg-t-30">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Должность:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <select class="form-control select2-show-search{{ $errors->has('position_id') ? ' is-invalid' : '' }}" name="position_id">
                                    <option value="">Выберите должность</option>
                                    @foreach($positions as $position)

                                    @endforeach
                                </select>
                                @if ($errors->has('position_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('position_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><!-- row -->
                        <div class="row row-xs mg-t-30">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Подразделение:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <select class="form-control select2-show-search{{ $errors->has('department_id') ? ' is-invalid' : '' }}" name="department_id">
                                    <option value="">Выберите подразделение</option>
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}" @if($department->id == $myEmployees->department_id) selected @endif>{{$department->department}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('department_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('department_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><!-- row -->
                        <div class="row row-xs mg-t-30">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Ставка:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <select class="form-control select2{{ $errors->has('department_id') ? ' is-invalid' : '' }}" name="rate">
                                    <option value="">Выберите ставку</option>
                                    <option value="1" @if($myEmployees->rate == 1) selected @endif>1</option>
                                    <option value="0.75" @if($myEmployees->rate == 0.75) selected @endif>0.75</option>
                                    <option value="0.5" @if($myEmployees->rate == 0.5) selected @endif>0.5</option>
                                    <option value="0.25" @if($myEmployees->rate == 0.25) selected @endif>0.25</option>
                                </select>
                                @if ($errors->has('rate'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('rate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><!-- row -->
                        <div class="row row-xs mg-t-30">
                            <div class="col-sm-8 mg-l-auto">
                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-outline-primary mg-r-5">Обновить</button>
                                    <a href="{{route('my.employee')}}" class="btn btn-outline-secondary">Назад</a>
                                </div><!-- form-layout-footer -->
                            </div><!-- col-8 -->
                        </div>
                    </form>
                </div><!-- card -->
            </div><!-- col-6 -->

        </div><!-- row -->


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