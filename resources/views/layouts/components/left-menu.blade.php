<div class="sl-logo"><a href=""><i class="icon ion-android-star-outline"></i> Табель</a></div>
<div class="sl-sideleft">
    <div class="input-group input-group-search">
        <input type="search" name="search" class="form-control" placeholder="Поиск">
        <span class="input-group-btn">
          <button class="btn"><i class="fa fa-search"></i></button>
        </span><!-- input-group-btn -->
    </div><!-- input-group -->

    <label class="sidebar-label">Навигация</label>
    <div class="sl-sideleft-menu">
        <a href="{{url('/')}}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-home-outline tx-22"></i>
                <span class="menu-item-label">Панель управления</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{route('graphics')}}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-stats-bars tx-22"></i>
                <span class="menu-item-label">График</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-list-outline tx-22"></i>
                <span class="menu-item-label">Табель</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="{{route('my.employee')}}" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-person-stalker tx-22"></i>
                <span class="menu-item-label">Сотрудники</span>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-settings tx-24"></i>
                <span class="menu-item-label">Настройки</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('settings.user')}}" class="nav-link">Пользователи</a></li>
            <li class="nav-item"><a href="{{route('settings.role')}}" class="nav-link">Роли</a></li>
            <li class="nav-item"><a href="{{route('settings.employee')}}" class="nav-link">Сотрудники</a></li>
            <li class="nav-item"><a href="{{route('settings.department')}}" class="nav-link">Подразделения</a></li>
            <li class="nav-item"><a href="{{route('settings.position')}}" class="nav-link">Должности</a></li>
            <li class="nav-item"><a href="{{route('settings.type')}}" class="nav-link">Типы графиков</a></li>
        </ul>
    </div><!-- sl-sideleft-menu -->

    <br>
</div><!-- sl-sideleft -->