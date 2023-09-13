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
                <form action="{{ route('departments.update', $data->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="form-group">
                            <label>Выберите факультет</label>
                            <select name="educational_program_id" class="form-control">
                                @foreach($programs as $program)
                                    @if($program->id === $data->educationProgram->id)
                                        <option value="{{ $program->id }}" selected>{{ $program->name_kz }}
                                            | {{ $program->name_ru }}</option>
                                    @else
                                        <option value="{{ $program->id }}">{{ $program->name_kz }}
                                            | {{ $program->name_ru }}</option>
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
