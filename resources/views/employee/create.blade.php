@extends('layouts.app')

@section('css-page')
    <!-- vendor css -->
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/jquery.dataTables.css')}}" rel="stylesheet">
@endsection

@section('content')

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/')}}">Главная</a>
        <a class="breadcrumb-item" href="{{route('my.employee')}}">Сотрудники</a>
        <span class="breadcrumb-item active">Добавление сотрудника</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Сотрудники</h5>
        </div><!-- sl-page-title -->

        <div class="row row-sm mg-t-20">

            <div class="col-xl-6 mg-t-25 mg-xl-t-0">
                <div class="card pd-20 pd-sm-40 form-layout form-layout-5">
                    <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-25">Добавление сотрудника</h6>
                    <form action="{{route('my.employee.store')}}" method="POST">
                        {{csrf_field()}}
                        <div class="row row-xs">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>ФИО сотрудника:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                                <select class="form-control select2-show-search{{ $errors->has('employee_id') ? ' is-invalid' : '' }}" name="employee_id">
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
                        </div><!-- row -->
                        <div class="row row-xs mg-t-30">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Должность:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
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
                        </div><!-- row -->
                        <div class="row row-xs mg-t-30">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Подразделение:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
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
                        </div><!-- row -->
                        <div class="row row-xs mg-t-30">
                            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span>Ставка:</label>
                            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
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
                        </div><!-- row -->
                        <div class="row row-xs mg-t-30">
                            <div class="col-sm-8 mg-l-auto">
                                <div class="form-layout-footer">
                                    <button type="submit" class="btn btn-outline-primary mg-r-5">Добавить</button>
                                    <a href="{{route('my.employee')}}" class="btn btn-outline-secondary">Назад</a>
                                </div><!-- form-layout-footer -->
                            </div><!-- col-8 -->
                        </div>
                    </form>
                </div><!-- card -->
            </div><!-- col-6 -->

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