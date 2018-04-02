<div class="dropdown">
    <a href="" class="nav-link nav-link-profile" data-toggle="dropdown">
        <span class="logged-name">{{Auth::user()->login}}</span>
        <img src="{{asset('img/user_icon_default.png')}}" class="wd-32 rounded-circle" alt="">
    </a>
    <div class="dropdown-menu dropdown-menu-header wd-200">
        <ul class="list-unstyled user-profile-nav">
            <li><a href=""><i class="icon ion-ios-person-outline"></i> Профиль</a></li>
            <li><a href=""><i class="icon ion-ios-gear-outline"></i> Настройки</a></li>
            <li>
                <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="icon ion-power"></i> Выход
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div><!-- dropdown-menu -->
</div><!-- dropdown -->
