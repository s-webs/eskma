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
                <form action="{{ route('educationalPrograms.update', $data->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Выберите факультет</label>
                            <select name="faculty_id" class="form-control">
                                @foreach($faculties as $faculty)
                                    @if($faculty->id === $data->faculty->id)
                                        <option value="{{ $faculty->id }}" selected>{{ $faculty->name_kz }}
                                            | {{ $faculty->name_ru }}</option>
                                    @else
                                        <option value="{{ $faculty->id }}">{{ $faculty->name_kz }}
                                            | {{ $faculty->name_ru }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название на казахском</label>
                            <input name="name_kz" type="text" class="form-control" id="exampleInputEmail1"
                                   placeholder="Название на казахском" value="{{ $data->name_kz }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Название на русском</label>
                            <input name="name_ru" type="text" class="form-control" id="exampleInputEmail1"
                                   placeholder="Название на русском" value="{{ $data->name_ru }}">
                        </div>
                        <div class=" form-group">
                            <label for="exampleInputEmail1">Название на английском</label>
                            <input name="name_en" type="text" class="form-control" id="exampleInputEmail1"
                                   placeholder="Название на английском" value="{{ $data->name_en }}">
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
