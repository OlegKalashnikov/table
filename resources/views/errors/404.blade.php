<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Starlight">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/starlight/img/starlight-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/starlight">
    <meta property="og:title" content="Starlight">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/starlight/img/starlight-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>{{config('app.name')}}</title>

    <!-- vendor css -->
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/ionicons.css')}}" rel="stylesheet">


    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('css/starlight.css')}}">
</head>

<body>

<div class="ht-100v bg-sl-primary d-flex align-items-center justify-content-center">
    <div class="wd-lg-70p wd-xl-50p tx-center pd-x-40">
        <h1 class="tx-100 tx-xs-140 tx-normal tx-white mg-b-0">404!</h1>
        <h5 class="tx-xs-24 tx-normal tx-info mg-b-30 lh-5">Страница, которую вы ищете, не найдена.</h5>
        <p class="tx-16 mg-b-30 tx-white-5">Возможно, страница, которую вы ищете, была удалена, ее имя было изменено или недоступно.
            Возможно, вы можете попробовать выполнить поиск:</p>

        <div class="d-flex justify-content-center">
            <div class="d-flex wd-xs-300">
                <input type="text" class="form-control form-control-inverse ht-40" placeholder="Поиск ...">
                <button class="btn btn-info bd-0 mg-l-5 ht-40"><i class="fa fa-search"></i></button>
            </div>
        </div><!-- d-flex -->

        <div class="tx-center mg-t-20">... или вернуться на <a href="{{url('/')}}">главную</a></div>
    </div>
</div><!-- ht-100v -->

<script src="{{asset('js/jquery.js')}}"></script>
<script src="{{asset('js/popper.js')}}"></script>
<script src="{{asset('js/bootstrap.js')}}"></script>

</body>
</html>
