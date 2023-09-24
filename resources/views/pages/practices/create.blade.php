@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Создать новую практику</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form action="{{ route('practices.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Преподаватель на базе</label>
                            <select name="practice_base_users_id" class="form-control">
                                @foreach($baseUsers as $item)
                                    <option value="{{ $item->id }}">
                                        {{ $item->user->surname }}
                                        {{ $item->user->name }}
                                        {{ $item->user->patronymic }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <input name="teacher_id" type="number" value="{{ auth()->user()->teacher->id }}"
                               style="display: none">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название</label>
                            <input name="title" type="text" class="form-control" id="exampleInputEmail1"
                                   placeholder="Название" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Количество часов</label>
                            <input name="duration" type="number" class="form-control" id="exampleInputEmail1"
                                   placeholder="Количество часов" required>
                        </div>
                        <div class="form-group">
                            <label>Год обучения</label>
                            <select name="academic_year_id" class="form-control">
                                @foreach($years as $year)
                                    <option value="{{ $year->id }}">{{ $year->start }}
                                        / {{ $year->end }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Язык</label>
                            <select name="language" class="form-control">
                                <option value="kz">KZ</option>
                                <option value="kz">RU</option>
                                <option value="kz">EN</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Начало</label>
                            <input name="start" type="date">
                        </div>
                        <div class="form-group">
                            <label>Окончание</label>
                            <input name="end" type="date">
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
