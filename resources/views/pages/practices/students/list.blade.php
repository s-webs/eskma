@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Студенты на практике "{{ 'Практика' }}"</h1>
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
                                <a href="{{ route('add-students-to-practice', $practiceID) }}" type="button"
                                   class="btn btn-block btn-primary btn-lg">Добавить</a>
                            </h3>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Фио</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->student->user->surname }} {{ $student->student->user->name }} {{ $student->student->user->patronymic }}</td>
                                        <td>{{ $student->student->user->email }}</td>
                                        <td class="text-right">
                                            <a href="##" type="button" class="btn btn-primary btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <form action=""
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
