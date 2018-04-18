@extends('layouts.app')

@section('css-page')
    <!-- Plugins css -->
    <link href="{{asset('plugins/timepicker/bootstrap-timepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/mjolnic-bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/clockpicker/bootstrap-clockpicker.min.css')}}" rel="stylesheet">
    <link href="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <!--Form Wizard-->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/jquery.steps/demo/css/jquery.steps.css')}}" />

    <link href="{{asset('plugins/multiselect/css/multi-select.css')}}"  rel="stylesheet" type="text/css" />
    <link href="{{asset('plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Создание графика</h4>

                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="{{route('graphic')}}">Графики</a></li>
                        <li class="breadcrumb-item active">Индивидуальный график сотрудника</li>
                    </ol>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title m-t-0">Добавление данных</h4>
                    <p class="text-muted font-13 m-b-10">
                        Внесите данные для автоматического формирования табеля и графика.
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


                    <form id="wizard-vertical" action="{{route('graphic.add.employee')}}" method="POST">
                        {{csrf_field()}}
                        <h3>Основные данные</h3>
                        <section>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label " for="">Подразделение <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select name="department_id" class="form-controll select2" style="width: 100%">
                                        <option value="" >Выберите подразделение</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->department}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 control-label " for=""> Месяц <span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <select name="month" class="form-controll select2" style="width: 100%">
                                        <option value="1" @if($month == 1) selected @endif>Январь</option>
                                        <option value="2" @if($month == 2) selected @endif>Февраль</option>
                                        <option value="3" @if($month == 3) selected @endif>Март</option>
                                        <option value="4" @if($month == 4) selected @endif>Апрель</option>
                                        <option value="5" @if($month == 5) selected @endif>Май</option>
                                        <option value="6" @if($month == 6) selected @endif>Июнь</option>
                                        <option value="7" @if($month == 7) selected @endif>Июль</option>
                                        <option value="8" @if($month == 8) selected @endif>Август</option>
                                        <option value="9" @if($month == 9) selected @endif>Сентябрь</option>
                                        <option value="10" @if($month == 10) selected @endif>Октябрь</option>
                                        <option value="11" @if($month == 11) selected @endif>Ноябрь</option>
                                        <option value="12" @if($month == 12) selected @endif>Декабрь</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 form-control-label">Кол-во рабочих дней<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input type="text" name="number_of_working_days" placeholder="Например: 21" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="" class="col-sm-3 form-control-label">Сотрудники
                                    <span class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <select name="myemployees" class="select2 form-control">
                                        <option value="">Выберите сотрудника</option>
                                        @foreach($myemployees as $myemployee)
                                            <option value="{{$myemployee->id}}">{{$myemployee->employee->employee}} - {{$myemployee->position->position}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </section>
                        <h3>Норма часов</h3>
                        <section>
                            <div class="form-group row">
                                <label for="" class="col-lg-4 form-control-label">Месячная норма часов<span class="text-danger">*</span></label>
                                <div class="col-lg-8">
                                    <input name="monthly_rate_of_hours" type="text" placeholder=""
                                           class="form-control">
                                </div>
                            </div>
                        </section>
                        <h3>График и Табель</h3>
                        <section >
                            <div class="form-group row">
                                <label class="col-lg-4 form-control-label">Дата<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="date[]" id="datepicker-multiple-date">
                                            <span class="input-group-addon bg-custom b-0"><i class="icon-calender"></i></span>
                                        </div><!-- input-group -->
                                        <span class="font-13 text-muted m-b-20">ГГГГ-ММ-ДД</span>
                                </div>

                                <label class="col-lg-4 form-control-label">Часов в день на ставку<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <div class="input-group ">
                                        <input type="text" name="hours_per_day[]" data-mask="99:99"  class="form-control">
                                        <span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>
                                    </div>
                                    <span class="font-13 text-muted m-b-20">ЧЧ:ММ</span>
                                </div>

                                <label class="col-sm-4 form-control-label">Начало рабочего дня<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <div class="input-group ">
                                        <input type="text" name="from[]" data-mask="99:99"  class="form-control">
                                        <span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>
                                    </div>
                                    <span class="font-13 text-muted m-b-20">ЧЧ:ММ</span>
                                </div>

                                <label class="col-sm-4 form-control-label">Конец рабочего дня на ставку<span class="text-danger">*</span></label>
                                <div class="col-sm-7">
                                    <div class="input-group ">
                                        <input type="text" name="before[]" data-mask="99:99"  class="form-control">
                                        <span class="input-group-addon"> <span class="zmdi zmdi-time"></span> </span>
                                    </div>
                                    <span class="font-13 text-muted m-b-20">ЧЧ:ММ</span>
                                </div>
                            </div>
                            <div id="parentId">
                            </div>
                            <div class="form-group row">
                                <a htef="" class="btn btn-outline-primary" onclick="return addField()"><i class="fa fa-plus"></i> Добавить поле</a>
                            </div>
                        </section>
                    </form>
                    <!-- End #wizard-vertical -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-page')
    <!--Form Wizard-->
    <script src="{{asset('plugins/jquery.steps/build/jquery.steps.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{asset('plugins/jquery-validation/dist/jquery.validate.min.js')}}"></script>

    <script type="text/javascript" src="{{asset('plugins/multiselect/js/jquery.multi-select.js')}}"></script>
    <script type="text/javascript" src="{{asset('plugins/jquery-quicksearch/jquery.quicksearch.js')}}"></script>
    <script src="{{asset('plugins/select2/js/select2.full.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/bootstrap-maxlength/bootstrap-maxlength.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('plugins/bootstrap-inputmask/bootstrap-inputmask.min.js')}}" type="text/javascript"></script>
    <!--wizard initialization-->
    <script src="{{asset('js/jquery.wizard-init.js')}}" type="text/javascript"></script>

    <script type="text/javascript" src="{{asset('js/jquery.formadvanced.init.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery.form-pickers.init.js')}}"></script>

    <script src="{{asset('plugins/moment/moment.js')}}"></script>
    <script src="{{asset('plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <script src="{{asset('plugins/mjolnic-bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script src="{{asset('plugins/clockpicker/bootstrap-clockpicker.js')}}"></script>
    <script src="{{asset('plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <script src="{{asset('js/jquery.formadvanced.init.js')}}"></script>

    <script>
        var countOfFields = 1; // Текущее число полей
        var curFieldNameId = 1; // Уникальное значение для атрибута name
        var maxFieldLimit = 25; // Максимальное число возможных полей
        function deleteField(a) {
            if (countOfFields > 1)
            {
                // Получаем доступ к ДИВу, содержащему поле
                var contDiv = a.parentNode;
                // Удаляем этот ДИВ из DOM-дерева
                contDiv.parentNode.removeChild(contDiv);
                // Уменьшаем значение текущего числа полей
                countOfFields--;
            }
            // Возвращаем false, чтобы не было перехода по сслыке
            return false;
        }
        function addField() {
            // Проверяем, не достигло ли число полей максимума
            if (countOfFields >= maxFieldLimit) {
                alert("Число полей достигло своего максимума = " + maxFieldLimit);
                return false;
            }
            // Увеличиваем текущее значение числа полей
            countOfFields++;
            // Увеличиваем ID
            curFieldNameId++;
            // Создаем элемент ДИВ
            var div = document.createElement("div");
            // Добавляем HTML-контент с пом. свойства innerHTML
            div.innerHTML = "<div class=\"form-group row\">" +
                "<label class='col-lg-4 form-control-label'>Дата<span class='text-danger'>*</span></label>" +
                "<div class=\"col-sm-7\">\n" +
            "                                        <div class=\"input-group\">\n" +
            "                                            <input type=\"text\" class=\"form-control datepicker_recurring_start\" name=\"date[]\" >\n" +
            "                                            <span class=\"input-group-addon bg-custom b-0\"><i class=\"icon-calender\"></i></span>\n" +
            "                                        </div><!-- input-group -->\n" +
                    "<span class=\"font-13 text-muted m-b-20\">ГГГГ-ММ-ДД</span>\n" +

            "                                    </div>\n" +
                "<label class=\"col-lg-4 form-control-label\">Часов в день на ставку<span class=\"text-danger\">*</span></label>\n" +
                "                                <div class=\"col-sm-7\">\n" +
                "                                    <div class=\"input-group \">\n" +
                "                                        <input type=\"text\" name=\"hours_per_day[]\" data-mask=\"99:99\"  class=\"form-control\">\n" +
                "                                        <span class=\"input-group-addon\"> <span class=\"zmdi zmdi-time\"></span> </span>\n" +
                "                                    </div>\n" +
                "                                    <span class=\"font-13 text-muted m-b-20\">ЧЧ:ММ</span>\n" +
                "                                </div>" +
                "<label class=\"col-sm-4 form-control-label\">Начало рабочего дня<span class=\"text-danger\">*</span></label>\n" +
                "                                <div class=\"col-sm-7\">\n" +
                "                                    <div class=\"input-group \">\n" +
                "                                        <input type=\"text\" name=\"from[]\" data-mask=\"99:99\"  class=\"form-control\">\n" +
                "                                        <span class=\"input-group-addon\"> <span class=\"zmdi zmdi-time\"></span> </span>\n" +
                "                                    </div>\n" +
                "                                    <span class=\"font-13 text-muted m-b-20\">ЧЧ:ММ</span>\n" +
                "                                </div>" +
                "<label class=\"col-sm-4 form-control-label\">Конец рабочего дня на ставку<span class=\"text-danger\">*</span></label>\n" +
                "                                <div class=\"col-sm-7\">\n" +
                "                                    <div class=\"input-group \">\n" +
                "                                        <input type=\"text\" name=\"before[]\" data-mask=\"99:99\"  class=\"form-control\">\n" +
                "                                        <span class=\"input-group-addon\"> <span class=\"zmdi zmdi-time\"></span> </span>\n" +
                "                                    </div>\n" +
                "                                    <span class=\"font-13 text-muted m-b-20\">ЧЧ:ММ</span>\n" +
                "                                </div>" +
                "</div>";
            // Добавляем новый узел в конец списка полей
            document.getElementById("parentId").appendChild(div);
            // Возвращаем false, чтобы не было перехода по сслыке
            return false;
        }
    </script>

    <script>
        $('body').on('focus',"input.datepicker_recurring_start", function(){ // привязываем датапикер для динамически добавляемых элементов
            //console.log('bind', researchIndex);
            $(this).removeClass('datepicker_recurring_start'); // класс идентификатор можно удалить
            $(this).datepicker({
                firstDay: 1,
                format: "yyyy-mm-dd",
                clearBtn: true,
                multidate: true,
                multidateSeparator: ","
            });
        });

    </script>
@endsection
