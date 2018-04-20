<li class="list-inline-item dropdown notification-list">
    <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button"
       aria-haspopup="false" aria-expanded="false">
        <img src="{{asset('img/user_icon_default.png')}}" alt="user" class="rounded-circle">
    </a>
    <div class="dropdown-menu dropdown-menu-right profile-dropdown " aria-labelledby="Preview">
        <!-- item-->
        <div class="dropdown-item noti-title">
            <h5 class="text-overflow"><small>{{Auth::user()->login}}</small> </h5>
        </div>

        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item notify-item">
            <i class="zmdi zmdi-account-circle"></i> <span>Профиль</span>
        </a>

        <!-- item-->
        <a href="javascript:void(0);" class="dropdown-item notify-item">
            <i class="zmdi zmdi-settings"></i> <span>Настройки</span>
        </a>

        {{--<!-- item-->--}}
        {{--<a href="{{route('lockscreen')}}" class="dropdown-item notify-item">--}}
            {{--<i class="zmdi zmdi-lock-open"></i> <span>Заблокировать</span>--}}
        {{--</a>--}}

        <!-- item-->
        <a href="{{route('logout')}}" class="dropdown-item notify-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="zmdi zmdi-power"></i> <span>Выход</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>
