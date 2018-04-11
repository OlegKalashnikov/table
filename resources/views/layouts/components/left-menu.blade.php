<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul>

                <li class="has_sub">
                    <a href="{{url('/')}}" class="waves-effect">
                        <i class="zmdi zmdi-view-dashboard"></i><span> Панель управления </span>
                    </a>
                </li>

                <li class="has_sub">
                    <a href="{{route('my.employee')}}" class="waves-effect">
                        <i class="zmdi zmdi-account-add"></i> <span> Сотрудники </span>
                    </a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="zmdi zmdi-collection-plus"></i> <span> Совмещения </span>
                    </a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="zmdi zmdi-assignment-alert"></i><span> Неявки </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li><a href="javascript:void(0);">Больничный лист</a></li>
                        <li><a href="javascript:void(0);">Отпуск</a></li>
                        <li><a href="javascript:void(0);">Прогул</a></li>
                        <li><a href="javascript:void(0);">Без содержания</a></li>
                        <li><a href="javascript:void(0);">Ученический отпуск</a></li>
                        <li><a href="javascript:void(0);">Специализация</a></li>
                        <li><a href="javascript:void(0);">Командировка</a></li>
                    </ul>
                </li>


                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="zmdi zmdi-collection-text"></i><span> Отчетные формы </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        <li><a href="javascript:void(0);">График</a></li>
                        <li><a href="javascript:void(0);">Табель</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect">
                        <i class="zmdi zmdi-settings"></i><span> Настройки </span> <span class="menu-arrow"></span>
                    </a>
                    <ul class="list-unstyled">
                        @if(\App\User::role() == 1)
                            <li><a href="{{route('settings.user')}}">Пользователи</a></li>
                            <li><a href="{{route('settings.role')}}">Роли</a></li>
                            <li><a href="{{route('settings.employee')}}">Сотрудники</a></li>
                            <li><a href="{{route('settings.department')}}">Подразделения</a></li>
                            <li><a href="{{route('settings.position')}}">Должности</a></li>
                        @endif
                        @if((\App\User::role() == 1) || (\App\User::role() == 2))
                            <li><a href="{{route('settings.type')}}">Тип графиков</a></li>
                            <li><a href="{{route('settings.absence')}}">Типы невыходов</a></li>
                            <li><a href="{{route('settings.graphic')}}">Мои графики</a></li>
                        @endif
                    </ul>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
