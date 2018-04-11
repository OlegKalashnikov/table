<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- App Favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App title -->
    <title>{{config('app.name')}}</title>

    <!-- Bootstrap CSS -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <!-- App CSS -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" />

    <!-- Modernizr js -->
    <script src="{{asset('js/modernizr.min.js')}}"></script>

</head>


<body>

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">

    <div class="account-bg">
        <div class="card-box mb-0">
            <div class="text-center m-t-20">
                <a href="/" class="logo">
                    <span>{{config('app.name')}}</span>
                </a>
            </div>
            <div class="m-t-10 p-20">
                <form method="post" action="" role="form" class="text-center">
                    <div class="user-thumb">
                        <img src="{{asset('img/user_icon_default.png')}}" class="img-responsive rounded-circle img-thumbnail" alt="thumbnail">
                    </div>
                    <div class="form-group">
                        <p class="text-muted m-t-10">
                            Введите пароль для доступа к приложению.
                        </p>
                        <div class="form-group row m-t-30">
                            <div class="col-12">
                                <input class="form-control" type="password" name="password" required="" placeholder="Введите пароль">
                            </div>
                        </div>

                        <div class="form-group row text-center m-t-20 mb-0">
                            <div class="col-12">
                                <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Войти</button>
                            </div>
                        </div>
                    </div>

                </form>


            </div>
        </div>
    </div>
    <!-- end card-box-->

    <div class="m-t-20">
        <div class="text-center">
            <p class="text-white">Это не вы?<a href="{{route('login')}}" class="text-white m-l-5"><b>Авторизоваться</b></a></p>
        </div>
    </div>

</div>
<!-- end wrapper page -->


<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/popper.min.js"></script><!-- Tether for Bootstrap -->
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/detect.js"></script>
<script src="assets/js/fastclick.js"></script>
<script src="assets/js/jquery.blockUI.js"></script>
<script src="assets/js/waves.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/plugins/switchery/switchery.min.js"></script>

<!-- App js -->
<script src="assets/js/jquery.core.js"></script>
<script src="assets/js/jquery.app.js"></script>

</body>
</html>