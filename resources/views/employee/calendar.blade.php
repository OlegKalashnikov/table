@extends('layouts.app')

@section('css-page')
    <!--calendar css-->
    <link href="{{asset('plugins/fullcalendar/css/fullcalendar.min.css')}}" rel="stylesheet" />
@endsection

@section('content')

    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Calendar</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Uplon</a></li>
                        <li class="breadcrumb-item active">Calendar</li>
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
                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    @if(\App\User::role() == 1)
                                    <a href="#" data-toggle="modal" data-target="#add-category" class="btn btn-lg btn-success btn-block waves-effect m-t-20 waves-light">
                                        <i class="fa fa-plus"></i> Новый шаблон
                                    </a>
                                    @endif
                                    <div id="external-events" class="m-t-20">
                                        <br>
                                        <p class="text-muted">Перетащите шаблон или нажмите в календаре</p>
                                        <div class="external-event bg-success" data-class="bg-success">
                                            <i class="fa fa-move"></i>8
                                        </div>
                                        <div class="external-event bg-primary" data-class="bg-primary">
                                            <i class="fa fa-move"></i>с 8 до 16
                                        </div>
                                        <div class="external-event bg-success" data-class="bg-success">
                                            <i class="fa fa-move"></i>7
                                        </div>
                                        <div class="external-event bg-primary" data-class="bg-primary">
                                            <i class="fa fa-move"></i>с 8 до 15
                                        </div>
                                    </div>

                                    <!-- checkbox -->
                                    <div class="checkbox checkbox-custom m-t-40">
                                        <input id="drop-remove" type="checkbox">
                                        <label for="drop-remove">
                                            Удалить после перемещения
                                        </label>
                                    </div>

                                </div>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-md-9">
                            <div id="calendar"></div>
                        </div> <!-- end col -->
                    </div>  <!-- end row -->
                </div>

                <!-- BEGIN MODAL -->
                <div class="modal fade none-border" id="event-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Добавить новое значение</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body p-20"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Закрыть</button>
                                <button type="button" class="btn btn-success save-event waves-effect waves-light">Создать</button>
                                <button type="button" class="btn btn-danger delete-event waves-effect waves-light" data-dismiss="modal">Удалить</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Add Category -->
                <div class="modal fade none-border" id="add-category">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add a category</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body p-20">
                                <form role="form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="control-label">Category Name</label>
                                            <input class="form-control form-white" placeholder="Enter name" type="text" name="category-name"/>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Choose Category Color</label>
                                            <select class="form-control form-white" data-placeholder="Choose a color..." name="category-color">
                                                <option value="success">Табель</option>
                                                <option value="primary">График</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-danger waves-effect waves-light save-category" data-dismiss="modal">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MODAL -->
            </div>
            <!-- end col-12 -->
        </div> <!-- end row -->

    </div>

@endsection

@section('js-page')
    <!-- Jquery-Ui -->
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>

    <!-- BEGIN PAGE SCRIPTS -->
    <script src="{{asset('plugins/moment/moment.js')}}"></script>
    <script src='{{asset('plugins/fullcalendar/js/fullcalendar.min.js')}}'></script>
    <script src="{{asset('js/jquery.fullcalendar.js')}}"></script>
@endsection


{{--@section('js-page')--}}
    {{--<script src="{{asset('js/jquery.dataTables.js')}}"></script>--}}
    {{--<script src="{{asset('js/select2.min.js')}}"></script>--}}
    {{--<script src="{{asset('js/moment.min.js')}}"></script>--}}
    {{--<script src="{{asset('js/fullcalendar.js')}}"></script>--}}

    {{--<script>--}}
        {{--$(function() {--}}

            {{--// initialize the external events--}}
            {{--// -------------------------------------------------------------------}}

            {{--$('#external-events .fc-event').each(function() {--}}

                {{--// store data so the calendar knows to render an event upon drop--}}
                {{--$(this).data('event', {--}}
                    {{--title: $.trim($(this).text()), // use the element's text as the event title--}}
                    {{--stick: true // maintain when user navigates (see docs on the renderEvent method)--}}
                {{--});--}}

                {{--// make the event draggable using jQuery UI--}}
                {{--$(this).draggable({--}}
                    {{--zIndex: 999,--}}
                    {{--revert: true,      // will cause the event to go back to its--}}
                    {{--revertDuration: 0  //  original position after the drag--}}
                {{--});--}}

            {{--});--}}

            {{--// initialize the calendar--}}
            {{--// -------------------------------------------------------------------}}

            {{--$('#calendar').fullCalendar({--}}
                {{--firstDay: 1,--}}
                {{--header: {--}}
                    {{--left: 'prev,next today',--}}
                    {{--center: 'title',--}}
                    {{--right: 'month,agendaWeek,agendaDay'--}}
                {{--},--}}
                {{--editable: true,--}}
                {{--droppable: true, // this allows things to be dropped onto the calendar--}}
                {{--drop: function() {--}}
                    {{--// is the "remove after drop" checkbox checked?--}}
                    {{--if ($('#drop-remove').is(':checked')) {--}}
                        {{--// if so, remove the element from the "Draggable Events" list--}}
                        {{--$(this).remove();--}}
                    {{--}--}}
                {{--},--}}
                {{--dayClick: function(date, allDay, jsEvent, view) {--}}

                {{--},--}}
                {{--/* обработчик кликак по событияю */--}}
                {{--eventClick: function(calEvent, jsEvent, view) {--}}
                   {{----}}
                {{--},--}}
                {{--eventReceive: function(event){--}}
                    {{--var data = event.title;--}}
                    {{--var date = event.start.format('YYYY-MM-DD');--}}
                    {{--var myemployee_id = "{{$nameEmployee->id}}";--}}
                    {{--console.log(data);--}}
                    {{--console.log(date);--}}
                    {{--console.log(myemployee_id);--}}
                    {{--$.ajaxSetup({--}}
                        {{--headers: {--}}
                            {{--'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
                        {{--}--}}
                    {{--});--}}
                    {{--$.ajax({--}}
                        {{--url: "{{route('my.employee.event')}}",--}}
                        {{--data: "data="+data+"&date="+date+"&myemployee_id="+myemployee_id,--}}
                        {{--type: "POST",--}}
                        {{--dataType: "json",--}}
                        {{--success: function(res){--}}

                        {{--},--}}
                        {{--error: function(e){--}}
                            {{--console.log(e.responseText);--}}
                        {{--}--}}
                    {{--});--}}
                {{--}--}}
            {{--});--}}

        {{--});--}}
    {{--</script>--}}

            {{--<script>--}}
                {{--!function($) {--}}
                    {{--"use strict";--}}

                    {{--var CalendarApp = function() {--}}
                        {{--this.$body = $("body")--}}
                        {{--this.$modal = $('#event-modal'),--}}
                            {{--this.$event = ('#external-events div.external-event'),--}}
                            {{--this.$calendar = $('#calendar'),--}}
                            {{--this.$saveCategoryBtn = $('.save-category'),--}}
                            {{--this.$categoryForm = $('#add-category form'),--}}
                            {{--this.$extEvents = $('#external-events'),--}}
                            {{--this.$calendarObj = null--}}
                    {{--};--}}


                    {{--/* on drop */--}}
                    {{--CalendarApp.prototype.onDrop = function (eventObj, date) {--}}
                        {{--var $this = this;--}}
                        {{--// retrieve the dropped element's stored Event Object--}}
                        {{--var originalEventObject = eventObj.data('eventObject');--}}
                        {{--var $categoryClass = eventObj.attr('data-class');--}}
                        {{--// we need to copy it, so that multiple events don't have a reference to the same object--}}
                        {{--var copiedEventObject = $.extend({}, originalEventObject);--}}
                        {{--// assign it the date that was reported--}}
                        {{--copiedEventObject.start = date;--}}
                        {{--if ($categoryClass)--}}
                            {{--copiedEventObject['className'] = [$categoryClass];--}}
                        {{--// render the event on the calendar--}}
                        {{--$this.$calendar.fullCalendar('renderEvent', copiedEventObject, true);--}}
                        {{--// is the "remove after drop" checkbox checked?--}}
                        {{--if ($('#drop-remove').is(':checked')) {--}}
                            {{--// if so, remove the element from the "Draggable Events" list--}}
                            {{--eventObj.remove();--}}
                        {{--}--}}
                    {{--},--}}
                        {{--/* on click on event */--}}
                        {{--CalendarApp.prototype.onEventClick =  function (calEvent, jsEvent, view) {--}}
                            {{--var $this = this;--}}
                            {{--var form = $("<form></form>");--}}
                            {{--form.append("<label>Change event name</label>");--}}
                            {{--form.append("<div class='input-group'><input class='form-control' type=text value='" + calEvent.title + "' /><span class='input-group-btn'><button type='submit' class='btn btn-success waves-effect waves-light'><i class='fa fa-check'></i> Save</button></span></div>");--}}
                            {{--$this.$modal.modal({--}}
                                {{--backdrop: 'static'--}}
                            {{--});--}}
                            {{--$this.$modal.find('.delete-event').show().end().find('.save-event').hide().end().find('.modal-body').empty().prepend(form).end().find('.delete-event').unbind('click').click(function () {--}}
                                {{--$this.$calendarObj.fullCalendar('removeEvents', function (ev) {--}}
                                    {{--return (ev._id == calEvent._id);--}}
                                {{--});--}}
                                {{--$this.$modal.modal('hide');--}}
                            {{--});--}}
                            {{--$this.$modal.find('form').on('submit', function () {--}}
                                {{--calEvent.title = form.find("input[type=text]").val();--}}
                                {{--$this.$calendarObj.fullCalendar('updateEvent', calEvent);--}}
                                {{--$this.$modal.modal('hide');--}}
                                {{--return false;--}}
                            {{--});--}}
                        {{--},--}}
                        {{--/* on select */--}}
                        {{--CalendarApp.prototype.onSelect = function (start, end, allDay) {--}}
                            {{--var $this = this;--}}
                            {{--$this.$modal.modal({--}}
                                {{--backdrop: 'static'--}}
                            {{--});--}}
                            {{--var form = $("<form></form>");--}}
                            {{--form.append("<div class='row'></div>");--}}
                            {{--form.find(".row")--}}
                                {{--.append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Event Name</label><input class='form-control' placeholder='Insert Event Name' type='text' name='title'/></div></div>")--}}
                                {{--.append("<div class='col-md-6'><div class='form-group'><label class='control-label'>Category</label><select class='form-control' name='category'></select></div></div>")--}}
                                {{--.find("select[name='category']")--}}
                                {{--.append("<option value='bg-danger'>Danger</option>")--}}
                                {{--.append("<option value='bg-success'>Success</option>")--}}
                                {{--.append("<option value='bg-purple'>Purple</option>")--}}
                                {{--.append("<option value='bg-primary'>Primary</option>")--}}
                                {{--.append("<option value='bg-pink'>Pink</option>")--}}
                                {{--.append("<option value='bg-info'>Info</option>")--}}
                                {{--.append("<option value='bg-warning'>Warning</option></div></div>");--}}
                            {{--$this.$modal.find('.delete-event').hide().end().find('.save-event').show().end().find('.modal-body').empty().prepend(form).end().find('.save-event').unbind('click').click(function () {--}}
                                {{--form.submit();--}}
                            {{--});--}}
                            {{--$this.$modal.find('form').on('submit', function () {--}}
                                {{--var title = form.find("input[name='title']").val();--}}
                                {{--var beginning = form.find("input[name='beginning']").val();--}}
                                {{--var ending = form.find("input[name='ending']").val();--}}
                                {{--var categoryClass = form.find("select[name='category'] option:checked").val();--}}
                                {{--if (title !== null && title.length != 0) {--}}
                                    {{--$this.$calendarObj.fullCalendar('renderEvent', {--}}
                                        {{--title: title,--}}
                                        {{--start:start,--}}
                                        {{--end: end,--}}
                                        {{--allDay: false,--}}
                                        {{--className: categoryClass--}}
                                    {{--}, true);--}}
                                    {{--$this.$modal.modal('hide');--}}
                                {{--}--}}
                                {{--else{--}}
                                    {{--alert('You have to give a title to your event');--}}
                                {{--}--}}
                                {{--return false;--}}

                            {{--});--}}
                            {{--$this.$calendarObj.fullCalendar('unselect');--}}
                        {{--},--}}
                        {{--CalendarApp.prototype.enableDrag = function() {--}}
                            {{--//init events--}}
                            {{--$(this.$event).each(function () {--}}
                                {{--// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)--}}
                                {{--// it doesn't need to have a start or end--}}
                                {{--var eventObject = {--}}
                                    {{--title: $.trim($(this).text()) // use the element's text as the event title--}}
                                {{--};--}}
                                {{--// store the Event Object in the DOM element so we can get to it later--}}
                                {{--$(this).data('eventObject', eventObject);--}}
                                {{--// make the event draggable using jQuery UI--}}
                                {{--$(this).draggable({--}}
                                    {{--zIndex: 999,--}}
                                    {{--revert: true,      // will cause the event to go back to its--}}
                                    {{--revertDuration: 0  //  original position after the drag--}}
                                {{--});--}}
                            {{--});--}}
                        {{--}--}}
                    {{--/* Initializing */--}}
                    {{--CalendarApp.prototype.init = function() {--}}
                        {{--this.enableDrag();--}}
                        {{--/*  Initialize the calendar  */--}}
                        {{--var date = new Date();--}}
                        {{--var d = date.getDate();--}}
                        {{--var m = date.getMonth();--}}
                        {{--var y = date.getFullYear();--}}
                        {{--var form = '';--}}
                        {{--var today = new Date($.now());--}}

                        {{--var defaultEvents =  [{--}}
                            {{--title: 'Hey!',--}}
                            {{--start: new Date($.now() + 158000000),--}}
                            {{--className: 'bg-purple'--}}
                        {{--}, {--}}
                            {{--title: 'See John Deo',--}}
                            {{--start: today,--}}
                            {{--end: today,--}}
                            {{--className: 'bg-danger'--}}
                        {{--}, {--}}
                            {{--title: 'Buy a Theme',--}}
                            {{--start: new Date($.now() + 338000000),--}}
                            {{--className: 'bg-primary'--}}
                        {{--}];--}}

                        {{--var $this = this;--}}
                        {{--$this.$calendarObj = $this.$calendar.fullCalendar({--}}
                            {{--//slotDuration: '00:15:00', /* If we want to split day time each 15minutes */--}}
                            {{--//minTime: '08:00:00',--}}
                            {{--//maxTime: '19:00:00',--}}
                            {{--defaultView: 'month',--}}
                            {{--firstDay: 1,--}}
                            {{--handleWindowResize: true,--}}
                            {{--//height: $(window).height() - 200,--}}
                            {{--header: {--}}
                                {{--left: 'prev,next today',--}}
                                {{--center: 'title',--}}
                                {{--right: 'month,agendaWeek,agendaDay'--}}
                            {{--},--}}
                            {{--//events: defaultEvents,--}}
                            {{--editable: true,--}}
                            {{--droppable: true, // this allows things to be dropped onto the calendar !!!--}}
                            {{--eventLimit: true, // allow "more" link when too many events--}}
                            {{--selectable: true,--}}
                            {{--drop: function(date) { $this.onDrop($(this), date); },--}}
                            {{--select: function (start, end, allDay) { $this.onSelect(start, end, allDay); },--}}
                            {{--eventClick: function(calEvent, jsEvent, view) { $this.onEventClick(calEvent, jsEvent, view); }--}}

                        {{--});--}}

                        {{--//on new event--}}
                        {{--this.$saveCategoryBtn.on('click', function(){--}}
                            {{--var categoryName = $this.$categoryForm.find("input[name='category-name']").val();--}}
                            {{--var categoryColor = $this.$categoryForm.find("select[name='category-color']").val();--}}
                            {{--if (categoryName !== null && categoryName.length != 0) {--}}
                                {{--$this.$extEvents.append('<div class="external-event bg-' + categoryColor + '" data-class="bg-' + categoryColor + '" style="position: relative;"><i class="fa fa-move"></i>' + categoryName + '</div>')--}}
                                {{--$this.enableDrag();--}}
                            {{--}--}}

                        {{--});--}}
                    {{--},--}}

                        {{--//init CalendarApp--}}
                        {{--$.CalendarApp = new CalendarApp, $.CalendarApp.Constructor = CalendarApp--}}

                {{--}(window.jQuery),--}}

{{--//initializing CalendarApp--}}
                    {{--function($) {--}}
                        {{--"use strict";--}}
                        {{--$.CalendarApp.init()--}}
                    {{--}(window.jQuery);--}}
            {{--</script>--}}

    {{--<script>--}}
        {{--$(function(){--}}
            {{--'use strict';--}}

{{--//            $('#calendar').fullCalendar({--}}
{{--//                header: {--}}
{{--//                    left: 'prev,next today',--}}
{{--//                    center: 'title',--}}
{{--//                    right: 'month,agendaWeek,agendaDay'--}}
{{--//                },--}}
{{--//                weekNumbers: true,--}}
{{--//                firstDay: 1,--}}
{{--//--}}
{{--//            });--}}

            {{--$('#datatable1').DataTable({--}}
                {{--responsive: true,--}}
                {{--language: {--}}
                    {{--searchPlaceholder: 'Поиск...',--}}
                    {{--sSearch: '',--}}
                    {{--lengthMenu: '_MENU_ записей/на странице',--}}
                {{--}--}}
            {{--});--}}

            {{--// Select2--}}
            {{--$('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });--}}
        {{--});--}}
    {{--</script>--}}
{{--@endsection--}}