@extends('layouts.app')

@section('css-page')
    <!-- form Uploads -->
    <link href="{{asset('plugins/fileuploads/css/dropify.min.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <div class="containet-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Список сотрудников организации</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Главная</a></li>
                        <li class="breadcrumb-item"><a href="#">Справочники</a></li>
                        <li class="breadcrumb-item"><a href="{{route('directory.employee')}}">Сотрудники</a></li>
                        <li class="breadcrumb-item active">Импорт данных</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="header-title m-t-0">Загрузка данных</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="p-20">
                        <form role="form" method="POST" action="{{route('directory.employee.upload')}}" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="card-box">
                                        <input type="file" class="dropify" name="upload" data-max-file-size="1M" />
                                        @if ($errors->has('employee'))
                                            <span class="invalid-feedback">
                                                <strong>{{ $errors->first('employee') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary waves-effect waves-light">
                                        Загрузить
                                    </button>
                                    <a href="{{route('directory.employee')}}" class="btn btn-secondary waves-effect m-l-5">
                                        Назад
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-page')
    <!-- file uploads js -->
    <script src="{{asset('plugins/fileuploads/js/dropify.min.js')}}"></script>

    <script type="text/javascript">
        $('.dropify').dropify({
            messages: {
                'default': 'Drag and drop a file here or click',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong appended.'
            },
            error: {
                'fileSize': 'The file size is too big (1M max).'
            }
        });
    </script>
@endsection
