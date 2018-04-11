<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App title -->
    <title>Регистрация</title>

    <!-- Bootstrap CSS -->
    <link href="{{asset("css/bootstrap.min.css")}}" rel="stylesheet" type="text/css" />

    <!-- App CSS -->
    <link href="{{asset("css/style.css")}}" rel="stylesheet" type="text/css" />

    <!-- Modernizr js -->
    <script src="{{asset("js/modernizr.min.js")}}"></script>

</head>


<body>

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">

    <div class="account-bg">
        <div class="card-box mb-0">
            <div class="text-center m-t-20">
                <a href="{{url('/')}}" class="logo">
                    <span>Электронный табель учета рабочего времени</span>
                </a>
            </div>
            <div class="m-t-10 p-20">

                <form class="m-t-20" action="{{route('register')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group row">
                        <div class="col-12">
                            <input type="text" name="name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}" placeholder="Введите ваше ФИО">
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <input type="text" name="login" class="form-control{{ $errors->has('login') ? ' is-invalid' : '' }}" value="{{ old('login') }}" placeholder="Введите ваш логин">
                            @if ($errors->has('login'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('login') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Введите ваш пароль">
                            @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Повторите ввод пароля">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox-signup" type="checkbox" checked="checked">
                                <label for="checkbox-signup">I accept <a href="#">Terms and Conditions</a></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row text-center m-t-10">
                        <div class="col-12">
                            <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Зарегистрироваться</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <!-- end card-box-->

    <div class="m-t-20">
        <div class="text-center">
            <p class="text-white">У вас уже есть учетная запись? <a href="{{route('login')}}" class="text-white m-l-5"><b>Войти в систему</b> </a></p>
        </div>
    </div>

</div>
<!-- end wrapper page -->


<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script><!-- Tether for Bootstrap -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/detect.js')}}"></script>
<script src="{{asset('js/fastclick.js')}}"></script>
<script src="{{asset('js/jquery.blockUI.js')}}"></script>
<script src="{{asset('js/waves.js')}}"></script>
<script src="{{asset('js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('js/jquery.scrollTo.min.js')}}"></script>
<script src="{{asset('js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('plugins/switchery/switchery.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('js/jquery.core.js')}}"></script>
<script src="{{asset('js/jquery.app.js')}}"></script>

</body>
</html>
