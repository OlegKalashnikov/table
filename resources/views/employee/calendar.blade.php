@extends('layouts.app')

@section('css-page')
    <!-- vendor css -->
    <link href="{{asset('css/jquery.dataTables.css')}}" rel="stylesheet">
    <link href="{{asset('css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/fullcalendar.min.css')}}" rel="stylesheet">
@endsection

@section('content')

    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="{{url('/')}}">Главная</a>
        <a class="breadcrumb-item" href="{{route('my.employee')}}">Сотрудники</a>
        <span class="breadcrumb-item active">{{$nameEmployee->employee->employee}}</span>
    </nav>

    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>Календарь</h5>
            <div>
                <a href="{{route('my.employee')}}" class="btn btn-outline-primary"><i class="fa fa-arrow-left"></i> Назад</a>
            </div>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
            <div class="row">
                <div class="col-3">
                    <button>Неявка</button>
                    <div id="external-events">
                        <p>
                            <strong>Данные для графика</strong>
                        </p>
                        @foreach($select as $row)
                            <div class="fc-event">c {{$row->from}} до {{$row->before}}</div>
                        @endforeach
                        <p>
                            <strong>Данные для табеля</strong>
                        </p>
                        @foreach($select as $row)
                            <div class="fc-event">{{$row->working_hours}}</div>
                        @endforeach

                    </div>
                </div>
                <div class="col-9">
                    <div id='calendar'></div>
                </div>
            </div>

        </div><!-- card -->

@endsection

@section('js-page')
    <script src="{{asset('js/jquery.dataTables.js')}}"></script>
    <script src="{{asset('js/select2.min.js')}}"></script>
    <script src="{{asset('js/moment.min.js')}}"></script>
    <script src="{{asset('js/fullcalendar.js')}}"></script>

    <script>
        $(function() {

            // initialize the external events
            // -----------------------------------------------------------------

            $('#external-events .fc-event').each(function() {

                // store data so the calendar knows to render an event upon drop
                $(this).data('event', {
                    title: $.trim($(this).text()), // use the element's text as the event title
                    stick: true // maintain when user navigates (see docs on the renderEvent method)
                });

                // make the event draggable using jQuery UI
                $(this).draggable({
                    zIndex: 999,
                    revert: true,      // will cause the event to go back to its
                    revertDuration: 0  //  original position after the drag
                });

            });

            // initialize the calendar
            // -----------------------------------------------------------------

            $('#calendar').fullCalendar({
                firstDay: 1,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                editable: true,
                droppable: true, // this allows things to be dropped onto the calendar
                drop: function() {
                    // is the "remove after drop" checkbox checked?
                    if ($('#drop-remove').is(':checked')) {
                        // if so, remove the element from the "Draggable Events" list
                        $(this).remove();
                    }
                },
                eventReceive: function(event){
                    var data = event.title;
                    var date = event.start.format('YYYY-MM-DD');
                    var myemployee_id = "{{$nameEmployee->employee_id}}";
                    console.log(data);
                    console.log(date);
                    console.log(myemployee_id);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: "{{route('my.employee.event')}}",
                        data: "data="+data+"&date="+date+"&myemployee_id="+myemployee_id,
                        type: "POST",
                        dataType: "json",
                        success: function(res){
                            console.log(res);
                        },
                        error: function(e){
                            console.log(e.responseText);
                        }
                    });
                }
            });

        });
    </script>


    <script>
        $(function(){
            'use strict';

//            $('#calendar').fullCalendar({
//                header: {
//                    left: 'prev,next today',
//                    center: 'title',
//                    right: 'month,agendaWeek,agendaDay'
//                },
//                weekNumbers: true,
//                firstDay: 1,
//
//            });

            $('#datatable1').DataTable({
                responsive: true,
                language: {
                    searchPlaceholder: 'Поиск...',
                    sSearch: '',
                    lengthMenu: '_MENU_ записей/на странице',
                }
            });

            // Select2
            $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
        });
    </script>
@endsection