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
</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="/assets/images/logo.png" alt="AdminLTELogo" style="width: 200px;">
</div>

<div class="container">
    <div class="wrapper">
        @yield('content')
    </div>
    <footer class="main-footer" style="margin-left: 0;">
        <strong>SKMA Online 2023</strong>
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 1.0
        </div>
    </footer>
</div>

<script src="/plugins/jquery/jquery.min.js"></script>

<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>

<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>

<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="/plugins/chart.js/Chart.min.js"></script>

<script src="/plugins/sparklines/sparkline.js"></script>

<script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="/plugins/jquery-knob/jquery.knob.min.js"></script>

<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>

<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="/plugins/summernote/summernote-bs4.min.js"></script>

<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="/dist/js/adminlte.js?v=3.2.0"></script>

<script src="/dist/js/demo.js"></script>

<script src="/dist/js/pages/dashboard.js"></script>

<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script>
    console.log("{{ csrf_token() }}")
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
</body>
</html>
