@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <table>
                        <tr>
                            <td>ФИО сотрудника</td>
                            <td>Должность</td>
                            <td>Месячная норма</td>
                            <td>Дата</td>
                            <td>График работы</td>
                        </tr>
                        <?php $ptr = 0; ?>
                        @foreach($graphics as $graphic)
                            @if($ptr == 0)<tr>@endif
                                <td>{{$graphic->myemployee_id}}</td>
                                <td>{{$graphic->date}}</td>
                                <td><b>{{$ptr}}</b>></td>

                            @if($ptr == 3)</tr>@endif
                            <?php
                                if($ptr == 3){
                                    $ptr = 0;
                                }else{
                                    $ptr++;
                                }
                            ?>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection