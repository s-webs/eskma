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
                            @role('teacher')
                            @if($practice->status === 1)
                                <h3 class="card-title">
                                    <a href="{{ route('add-students-to-practice', $practiceID) }}" type="button"
                                       class="btn btn-block btn-primary btn-lg">Добавить</a>
                                </h3>
                            @endif
                            @endrole
                        </div>
                        @livewire('list-students', ['practiceId' => $practiceID, 'practice' => $practice])
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
