@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавить год обучения</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form action="{{ route('academicYears.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Начало</label>
                            <input name="start" type="number" class="form-control" id="exampleInputEmail1"
                                   placeholder="Начало">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Окончание</label>
                            <input name="end" type="number" class="form-control" id="exampleInputEmail1"
                                   placeholder="Окончание">
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
