@extends('layouts.app')

@section('content')
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/')}}">Главная</a>
        <a class="breadcrumb-item" href="{{route('breadcrumb.settings')}}">Настройки</a>
        <span class="breadcrumb-item active">Роли</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Роли</h5>
            <div>
                <a href="{{route('settings.role.create')}}" class="btn btn-outline-primary"><i class="fa fa-plus"></i> Создание роли</a>
            </div>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Общий список</h6>

            <div class="table-responsive">
                <table class="table mg-b-0">
                    <thead>
                    <tr>
                        <th>
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </th>
                        <th>Роль</th>
                        <th>Описание</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>
                                <label class="ckbox mg-b-0">
                                    <input type="checkbox"><span></span>
                                </label>
                            </td>
                            <td></td>
                        </tr>
                    @endforeach
                    <tr>

                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>$320,800</td>
                    </tr>
                    <tr>
                        <td>
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td>Garrett Winters</td>
                        <td>Accountant</td>
                        <td>$170,750</td>
                    </tr>
                    <tr>
                        <td>
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td>Ashton Cox</td>
                        <td>Junior Technical Author</td>
                        <td>$86,000</td>
                    </tr>
                    <tr>
                        <td>
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td>Cedric Kelly</td>
                        <td>Senior Javascript Developer</td>
                        <td>$433,060</td>
                    </tr>
                    <tr>
                        <td>
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td>Airi Satou</td>
                        <td>Accountant</td>
                        <td>$162,700</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- card -->

@endsection