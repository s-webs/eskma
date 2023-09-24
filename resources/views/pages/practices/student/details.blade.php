@extends('layout')
@section('content')
    @foreach($practice->content as $content)
        @include('pages.practices.components.content_modal', ['content' => $content])
    @endforeach

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">
                                <strong>Дневник о прохождении производственной практики</strong><br>
                                "{{ $practice->practice->title }}"
                            </h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Образовательная программа:</strong> "Фармация"</p>
                            <p><strong>Обучающийся:</strong>
                                {{ $practice->student->user->surname }}
                                {{ $practice->student->user->name }}
                                {{ $practice->student->user->patronymic }}
                            </p>
                            <p><strong>Учебный год:</strong> {{ $practice->practice->academicYear->start }} -
                                {{ $practice->practice->academicYear->end }}</p>
                            <p><strong>Группа:</strong> {{ $practice->student->group->title }}</p>
                            <p><strong>Дата прохождения практики:</strong> {{ $practice->practice->start }} -
                                {{ $practice->practice->end }}</p>
                            <p><strong>Специалист по практике от ЮКМА:</strong>
                                {{ $practice->practice->teacher->user->surname }}
                                {{ $practice->practice->teacher->user->name }}
                                {{ $practice->practice->teacher->user->patronymic }}
                            </p>
                        </div>
                    </div>
                    @role('head_of_department')
                    <livewire:signature-component :practiceId="$practiceId" :role="'head_of_department'"/>
                    @endrole
                    @role('teacher')
                    <livewire:signature-component :practiceId="$practiceId" :role="'teacher'"/>
                    @endrole
                    @role('base_user')
                    <livewire:signature-component :practiceId="$practiceId" :role="'base_user'"/>
                    @endrole
                    @role('student')
                    <livewire:signature-component :practiceId="$practiceId" :role="'student'"/>
                    @endrole
                </div>
                <div class="col-6">
                    @include('pages.practices.components.practice_plan', ['practice' => $practice])
                    @include('pages.practices.components.practice_content', ['practice' => $practice])
                </div>
            </div>
        </div>
    </section>
@endsection
