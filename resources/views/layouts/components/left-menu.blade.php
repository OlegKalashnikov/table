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
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon ion-ios-pie-outline tx-20"></i>
                <span class="menu-item-label">Графики</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="chart-morris.html" class="nav-link">Morris Charts</a></li>
            <li class="nav-item"><a href="chart-flot.html" class="nav-link">Flot Charts</a></li>
            <li class="nav-item"><a href="chart-chartjs.html" class="nav-link">Chart JS</a></li>
            <li class="nav-item"><a href="chart-rickshaw.html" class="nav-link">Rickshaw</a></li>
            <li class="nav-item"><a href="chart-sparkline.html" class="nav-link">Sparkline</a></li>
        </ul>
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-ios-calendar-outline tx-24"></i>
                <span class="menu-item-label">Табель</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="form-elements.html" class="nav-link">Form Elements</a></li>
            <li class="nav-item"><a href="form-layouts.html" class="nav-link">Form Layouts</a></li>
            <li class="nav-item"><a href="form-validation.html" class="nav-link">Form Validation</a></li>
            <li class="nav-item"><a href="form-wizards.html" class="nav-link">Form Wizards</a></li>
            <li class="nav-item"><a href="form-editor-text.html" class="nav-link">Text Editor</a></li>
        </ul>
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon icon ion-person-stalker tx-24"></i>
                <span class="menu-item-label">Сотрудники</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{url('/employee/list')}}" class="nav-link">Form Elements</a></li>
            <li class="nav-item"><a href="form-layouts.html" class="nav-link">Form Layouts</a></li>
            <li class="nav-item"><a href="form-validation.html" class="nav-link">Form Validation</a></li>
            <li class="nav-item"><a href="form-wizards.html" class="nav-link">Form Wizards</a></li>
            <li class="nav-item"><a href="form-editor-text.html" class="nav-link">Text Editor</a></li>
        </ul>
        <a href="#" class="sl-menu-link">
            <div class="sl-menu-item">
                <i class="menu-item-icon fa fa-gears tx-24"></i>
                <span class="menu-item-label">Настройки</span>
                <i class="menu-item-arrow fa fa-angle-down"></i>
            </div><!-- menu-item -->
        </a><!-- sl-menu-link -->
        <ul class="sl-menu-sub nav flex-column">
            <li class="nav-item"><a href="{{route('settings.user')}}" class="nav-link">Пользователи</a></li>
            <li class="nav-item"><a href="{{route('settings.role')}}" class="nav-link">Роли</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Сотрудники</a></li>
            <li class="nav-item"><a href="{{route('settings.department')}}" class="nav-link">Подразделения</a></li>
            <li class="nav-item"><a href="{{route('settings.position')}}" class="nav-link">Должности</a></li>
        </ul>
    </div><!-- sl-sideleft-menu -->

    <br>
</div><!-- sl-sideleft -->