@extends('layouts.app')

@section('css-page')
    <!-- vendor css -->
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
@endsection

@section('content')

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/')}}">Главная</a>
        <a class="breadcrumb-item" href="{{route('my.employee')}}">Сотрудники</a>
        <span class="breadcrumb-item active">Редактирование сотрудника</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Сотрудники</h5>
        </div><!-- sl-page-title -->

        <div class="row row-sm mg-t-20">

            <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-25">Редактирование сотрудника</h6>
                    <form action="{{route('my.employee.update', $myEmployees->id)}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('patch')}}
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
                                        <option value="{{$position->id}}" @if($position->id == $myEmployees->position_id) selected @endif>{{$position->position}}</option>
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