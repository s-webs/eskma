<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf_token" content="{{ csrf_token() }}"/>
    <title>SKMA Online</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">

    <link rel="stylesheet" href="/dist/css/adminlte.min.css?v=3.2.0">

    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">

    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
    <link rel="icon" href="/assets/images/icon.png">
    @vite(['resources/js/app.js'])
    @stack('custom-styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="/assets/images/logo.png" alt="AdminLTELogo" style="width: 200px;">
    </div>

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="nav-link" href="route('logout')"
                       onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        <i class="fas fa-power-off"></i>
                    </a>
                </form>
            </li>
        </ul>
    </nav>


    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="/assets/images/avatar.png" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ route('profile.index') }}" class="d-block">
                        {{ auth()->user()->surname }} {{ auth()->user()->name }}
                    </a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('profile.index') }}" class="nav-link">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Профиль
                            </p>
                        </a>
                    </li>
                    @role('superuser')
                    <li class="nav-item">
                        <a href="{{ route('administrators.index') }}" class="nav-link">
                            <i class="nav-icon far fa-user"></i>
                            <p>
                                Администраторы
                            </p>
                        </a>
                    </li>
                    @endrole
                    @hasanyrole('superuser|admin')
                    <li class="nav-item">
                        <a href="{{ route('academicYears.index') }}" class="nav-link">
                            <i class="nav-icon far fa-calendar"></i>
                            <p>
                                Годы обучения
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('faculties.index') }}" class="nav-link">
                            <i class="nav-icon far fa-building"></i>
                            <p>
                                Факультеты
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('educationalPrograms.index') }}" class="nav-link">
                            <i class="nav-icon far fa-building"></i>
                            <p>
                                Образовательные программы
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('departments.index') }}" class="nav-link">
                            <i class="nav-icon far fa-building"></i>
                            <p>
                                Кафедры
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('groups.index') }}" class="nav-link">
                            <i class="nav-icon far fa-building"></i>
                            <p>
                                Группы
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('practice-bases.index') }}" class="nav-link">
                            <i class="nav-icon far fa-building"></i>
                            <p>
                                Базы практик
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('practice-base-users.index') }}" class="nav-link">
                            <i class="nav-icon far fa-building"></i>
                            <p>
                                Преподаватели на базе
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('teachers.index') }}" class="nav-link">
                            <i class="nav-icon far fa-building"></i>
                            <p>
                                Преподаватели на Кафедре
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('department-heads.index') }}" class="nav-link">
                            <i class="nav-icon far fa-building"></i>
                            <p>
                                Заведующие кафедрами
                            </p>
                        </a>
                    </li>
                    @endhasanyrole

                    @hasanyrole('superuser|admin|teacher')
                    <li class="nav-item">
                        <a href="{{ route('students.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Студенты
                            </p>
                        </a>
                    </li>
                    @endhasanyrole

                    @hasanyrole('superuser|admin|teacher|head_of_department|base_user')
                    <li class="nav-item">
                        <a href="{{ route('practices.index') }}" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Практика
                            </p>
                        </a>
                    </li>
                    @endhasanyrole

                    @hasanyrole('student')
                    <li class="nav-item">
                        <a href="{{ route('student.practices-index') }}" class="nav-link">
                            <i class="nav-icon fas fa-graduation-cap"></i>
                            <p>
                                Практика
                            </p>
                        </a>
                    </li>
                    @endhasanyrole
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        @yield('content')
    </div>

    <footer class="main-footer">
        <strong>SKMA Online 2023</strong>
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
        </div>
    </footer>

    <aside class="control-sidebar control-sidebar-dark">

    </aside>

</div>


<script src="/plugins/jquery/jquery.min.js"></script>

<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="/plugins/chart.js/Chart.min.js"></script>

<script src="/plugins/sparklines/sparkline.js"></script>

{{--<script src="/plugins/jqvmap/jquery.vmap.min.js"></script>--}}
{{--<script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>--}}

<script src="/plugins/jquery-knob/jquery.knob.min.js"></script>

<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>

<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="/plugins/summernote/summernote-bs4.min.js"></script>

<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="/dist/js/adminlte.js?v=3.2.0"></script>

{{--<script src="/dist/js/demo.js"></script>--}}

{{--<script src="/dist/js/pages/dashboard.js"></script>--}}
@livewireScripts


<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    $('#summernote').summernote({
        callbacks: {
            onImageUpload: function (files) {
                var editor = $(this);
                var formData = new FormData();
                formData.append('image', files[0]);
                console.log()
                // Отправляем изображение на сервер
                $.ajax({
                    url: '/upload-image', // Замените '/upload-image' на ваш URL-адрес загрузки изображений
                    method: 'POST',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        var imageUrl = response.url; // URL загруженного изображения
                        editor.summernote('insertImage', imageUrl);
                    },
                    error: function (response) {
                        console.error('Ошибка загрузки изображения.');
                    }
                });
            }
        }
    });
</script>
@stack('custom-scripts')
</body>
</html>
