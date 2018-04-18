@extends('layouts.app')

@section('css-page')
    <!-- Responsive table css -->
    <link href="{{asset('plugins/responsive-table/css/rwd-table.min.css')}}" rel="stylesheet" type="text/css" media="screen">
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Список графиков</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="">Отчетные формы</a></li>
                        <li class="breadcrumb-item"><a href="">Графики</a></li>
                        <li class="breadcrumb-item active">Редактирование графика</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <div class="col-12 m-t-20">
                        <h4 class="header-title m-t-0">График раборы сотрудников {{$department}}</h4>
                        <p class="text-muted font-13 m-b-10">

                        </p>

                        <div class="p-20">
                            {{--<div class="">--}}
                            <div class="table-rep-plugin">
                                <div class="table-responsive" data-pattern="priority-columns">
                                    <table id="tech-companies-1" class="table table-striped table-bordered">
                                        <thead class="thead-default">
                                        <tr>
                                            <th rowspan="2">№п/п</th>
                                            <th data-priority="1" rowspan="2">ФИО сотрудника</th>
                                            <th data-priority="3" rowspan="2">Должность</th>
                                            <th data-priority="1" colspan="{{$countDay}}">Календарь</th>
                                        </tr>
                                        <tr>
                                            @for($ptr=1;$ptr<=$countDay; $ptr++ )
                                                <th>{{$ptr}}</th>
                                            @endfor
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($graphics as  $graphic)
                                                <tr>
                                                    <td>1</td>
                                                    @foreach($graphic as $key => $td)
                                                    <td>{{$td}} - {{$td}}</td>
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-page')

    <!-- responsive-table-->
    <script src="{{asset('plugins/responsive-table/js/rwd-table.min.js')}}" type="text/javascript"></script>
@endsection