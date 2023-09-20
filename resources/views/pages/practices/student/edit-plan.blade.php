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
                <form action="{{ route('student.practices-update-plan', $plan->id) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Контент</label>
                            <textarea name="content" class="form-control" rows="3" placeholder="" value="" required>{{ $plan->content }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Примечание</label>
                            <textarea name="note" class="form-control" rows="3" placeholder="">{{ $plan->note }}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Начало</label>
                            <input name="start" type="date" value="{{ $plan->start }}" required>
                        </div>
                        <div class="form-group">
                            <label>Окончание</label>
                            <input name="end" type="date" value="{{ $plan->end }}" required>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Обновить</button>
                        <a href="{{ route('student.practices-details', $plan->practice_student_id) }}" type="submit"
                           class="btn btn-secondary">Назад</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
