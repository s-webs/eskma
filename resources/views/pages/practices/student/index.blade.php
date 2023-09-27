@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Практика</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Название практики</th>
                                    <th>Начало</th>
                                    <th>Окончание</th>
                                    <th>Статус</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($practices as $item)
                                    <tr>
                                        <td>{{ $item->practice->id }}</td>
                                        <td>{{ $item->practice->title }}</td>
                                        <td>{{ $item->practice->start }}</td>
                                        <td>{{ $item->practice->end }}</td>
                                        <td>
                                            @if($item->practice->status === 1)
                                                <span type="button" class="btn btn-success btn-sm">Активно</span>
                                            @else
                                                <span type="button" class="btn btn-danger btn-sm">Закончилась</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('student.practices-details', $item->id) }}" type="button"
                                               class="btn btn-primary btn-sm">
                                                <i class="fas fa-arrow-right"></i>
                                            </a>
                                            @isset($item->pdf_link)
                                                <a href="/{{ $item->pdf_link }}"
                                                   class="btn btn-primary btn-sm">
                                                    <i class="fas fa-file-pdf"></i>
                                                </a>
                                            @endisset
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
