@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавить образовательную программу</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form action="{{ route('educationalPrograms.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Выберите факультет</label>
                            <select name="faculty_id" class="form-control">
                                @foreach($faculties as $faculty)
                                    <option value="{{ $faculty->id }}">{{ $faculty->name_kz }}
                                        | {{ $faculty->name_ru }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название на казахском</label>
                            <input name="name_kz" type="text" class="form-control" id="exampleInputEmail1"
                                   placeholder="Название на казахском">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название на русском</label>
                            <input name="name_ru" type="text" class="form-control" id="exampleInputEmail1"
                                   placeholder="Название на русском">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название на английском</label>
                            <input name="name_en" type="text" class="form-control" id="exampleInputEmail1"
                                   placeholder="Название на английском">
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
