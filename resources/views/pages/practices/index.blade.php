@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Студенты</h1>
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
                            @role('teacher')
                            <h3 class="card-title">
                                <a href="{{ route('practices.create') }}" type="button"
                                   class="btn btn-block btn-primary btn-lg">Создать</a>
                            </h3>
                            @endrole
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название практики</th>
                                    <th>Начало</th>
                                    <th>Окончание</th>
                                    <th>Студенты</th>
                                    <th>Статус</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->title }}</td>
                                        <td>{{ $item->start }}</td>
                                        <td>{{ $item->end }}</td>
                                        <td><span type="button"
                                                  class="btn btn-primary btn-sm">{{ $item->practiceStudents->count() }}</span>
                                        </td>
                                        <td>
                                            @if($item->status === 1)
                                                <span type="button" class="btn btn-success btn-sm">Активно</span>
                                            @else
                                                <span type="button" class="btn btn-danger btn-sm">Закончилась</span>

                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('students-in-practice', $item->id) }}" type="button"
                                               class="btn btn-primary btn-sm">
                                                <i class="fas fa-users"></i>
                                            </a>
                                            @role('superuser|admin')
                                            @if($item->status === 1)
                                                <form action="{{ route('disable-practice', $item->id) }}"
                                                      method="post"
                                                      style="display: inline-block">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm">Завершить практику</button>
                                                </form>
                                            @else
                                                <form action="{{ route('disable-practice', $item->id) }}"
                                                      method="post"
                                                      style="display: inline-block">
                                                    @csrf
                                                    <button class="btn btn-primary btn-sm">Запустить практику</button>
                                                </form>
                                            @endif
                                            @endrole
                                            @role('teacher')
                                            @if($item->status === 1)
                                                <a href="{{ route('practices.edit', $item->id) }}" type="button"
                                                   class="btn btn-primary btn-sm">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <form action="{{ route('practices.destroy', $item->id) }}"
                                                      method="post"
                                                      style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn bg-gradient-danger btn-sm"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>
                                            @endif
                                            @endrole
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{--                        <div class="card-footer clearfix">--}}
                        {{--                            {{ $data->links() }}--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
