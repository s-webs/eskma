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
                            <h3 class="card-title">
                                <a href="{{ route('practices.create') }}" type="button"
                                   class="btn btn-block btn-primary btn-lg">Создать</a>
                            </h3>
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
                                        <td>120</td>
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
                                            <a href="##" type="button" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action="{{ route('practices.destroy', $item->id) }}"
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
                        {{--                        <div class="card-footer clearfix">--}}
                        {{--                            {{ $data->links() }}--}}
                        {{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
