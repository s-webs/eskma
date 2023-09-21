@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавить план практики</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form action="{{ route('student.practices-store-plan') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <input name="practice_student_id" type="number" value="{{ $id }}" style="display: none">
                        <div class="form-group">
                            <label>Контент</label>
                            <textarea name="content" class="form-control" rows="3" placeholder="" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Примечание</label>
                            <textarea name="note" class="form-control" rows="3" placeholder=""></textarea>
                        </div>
                        <div class="form-group">
                            <label>Начало</label>
                            <input name="start" type="date" required>
                        </div>
                        <div class="form-group">
                            <label>Окончание</label>
                            <input name="end" type="date" required>
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
