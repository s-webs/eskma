@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Преподаватели на базе</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="{{ route('practice-base-users.create') }}" type="button"
                                   class="btn btn-block btn-primary btn-lg">Создать</a>
                            </h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ФИО</th>
                                    <th>Email</th>
                                    <th>База практики</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->user->surname }} {{ $item->user->name }} {{ $item->user->patronymic }}</td>
                                        <td>{{ $item->user->email }}</td>
                                        <td>
                                            <span type="button"
                                                  class="btn btn-success btn-sm">{{ $item->base->name_ru }}
                                            </span>
                                        </td>
                                        <td>
                                            {{--                                            <a href="{{ route('practice-base-users.edit', $item->id) }}" type="button"--}}
                                            {{--                                               class="btn btn bg-gradient-info btn-sm"><i class="fas fa-pen"></i></a>--}}
                                            <form action="{{ route('practice-base-users.destroy', $item->id) }}"
                                                  method="post"
                                                  style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn bg-gradient-danger btn-sm"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
