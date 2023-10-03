@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактировать содержание практики</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form action="{{ route('student.practices-update-content', $content->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Контент</label>
                            <textarea name="content" id="summernote" required>
                                {!! $content->content !!}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Начало</label>
                            <input name="start" type="date" value="{{ $content->start }}" required>
                        </div>
                        <div class="form-group">
                            <label>Окончание</label>
                            <input name="end" type="date" value="{{ $content->end }}" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
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
@endpush
