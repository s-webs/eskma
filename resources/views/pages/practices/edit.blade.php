@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактировать</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form action="{{ route('practices.update', $data->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Выберите преподавателя на базе</label>
                            <select name="practice_base_users_id" class="form-control" required>
                                @foreach($baseTeachers as $baseTeacher)
                                    @if($baseTeacher->id === $data->practice_base_users_id)
                                        <option value="{{ $baseTeacher->id }}" selected>
                                            {{ $baseTeacher->user->surname }}
                                            {{ $baseTeacher->user->name }}
                                            {{ $baseTeacher->user->patronymic }}
                                        </option>
                                    @else
                                        <option value="{{ $baseTeacher->id }}">
                                            {{ $baseTeacher->user->surname }}
                                            {{ $baseTeacher->user->name }}
                                            {{ $baseTeacher->user->patronymic }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <input name="teacher_id" type="number" value="{{ $data->teacher_id }}"
                               style="display: none" required>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input name="title" type="text" class="form-control" id="exampleInputEmail1"
                                   placeholder="Название" value="{{ $data->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Количество часов</label>
                            <input name="duration" type="number" class="form-control" id="exampleInputEmail1"
                                   placeholder="Количество часов" value="{{ $data->duration }}" required>
                        </div>
                        <div class="form-group">
                            <label>Год обучения</label>
                            <select name="academic_year_id" class="form-control" required>
                                @foreach($years as $year)
                                    @if($data->academic_year_id === $year->id)
                                        <option value="{{ $year->id }}" selected>
                                            {{ $year->start }} / {{ $year->end }}
                                        </option>
                                    @else
                                        <option value="{{ $year->id }}">
                                            {{ $year->start }} / {{ $year->end }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Язык</label>
                            <select name="language" class="form-control" required>
                                <option value="kz">KZ</option>
                                <option value="kz">RU</option>
                                <option value="kz">EN</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Начало</label>
                            <input name="start" type="date" value="{{ $data->start }}" required>
                        </div>
                        <div class="form-group">
                            <label>Окончание</label>
                            <input name="end" type="date" value="{{ $data->end }}" required>
                        </div>
                        <div class="form-group">
                            <label>Активна практика?</label>
                            <select name="status" required>
                                @if($data->status === 1)
                                    <option value="1" selected>Да</option>
                                    <option value="0">Нет</option>
                                @else
                                    <option value="1">Да</option>
                                    <option value="0" selected>Нет</option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class=" card-footer">
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
