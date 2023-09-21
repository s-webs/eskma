@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"></div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Дневник о прохождении производственной практики
                                "{{ $practice->practice->year }}"</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Образовательная программа:</strong> "Фармация"</p>
                            <p><strong>Обучающийся:</strong>
                                {{ $practice->student->user->surname }}
                                {{ $practice->student->user->name }}
                                {{ $practice->student->user->patronymic }}
                            </p>
                            <p><strong>Учебный год:</strong> 2020-2021</p>
                            <p><strong>Группа:</strong> {{ $practice->student->group->title }}</p>
                            <p><strong>Дата прохождения практики:</strong> 24.05.2021 - 28.05.2021</p>
                            <p><strong>Специалист по практике от ЮКМА:</strong> Рахманова Гульнара</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Рабочий план-график производственной практики</h3>
                            <div class="card-tools">
                                @if($practice->plan->count() === 0)
                                    <a href="{{ route('student.practices-add-plan', $practice->id) }}" type="button"
                                       class="btn btn-primary btn-sm">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                @endif
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                                    <div class="row">
                                        <div class="col-12">
                                            @foreach($practice->plan as $plan)
                                                <div class="card card-primary">
                                                    <div class="card-header">
                                                        <h4 class="card-title">
                                                            {{ $plan->start }} - {{ $plan->end }}
                                                        </h4>
                                                        <div class="card-tools">
                                                            <a href="{{ route('student.practices-edit-plan', $plan->id) }}"
                                                               type="button"
                                                               class="btn btn-success btn-sm border-white">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
                                                            <form
                                                                action="{{ route('student.practices-delete-plan', $plan->id) }}"
                                                                method="post"
                                                                style="display: inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                        class="btn btn bg-gradient-danger btn-sm border-white">
                                                                    <i class="fas fa-trash"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <p>
                                                            {!! $plan->content !!}
                                                        </p>
                                                        @if(!empty($plan->note))
                                                            <div class="callout callout-info">
                                                                <p>{{ $plan->note }}</p>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Содержание производственной практики</h3>
                            <div class="card-tools">
                                <a href="{{ route('student.practices-add-content', $practice->id) }}" type="button"
                                   class="btn btn-primary btn-sm">
                                    <i class="fas fa-plus"></i>
                                </a>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-12 order-2 order-md-1">
                                    <div class="row">
                                        <div class="col-12">
                                            @foreach($practice->content as $content)
                                                <div class="card card-primary">
                                                    <div class="card-header">
                                                        <h4 class="card-title">
                                                            {{ $content->start }} - {{ $content->end }}
                                                        </h4>
                                                        <div class="card-tools">
                                                            <a href="{{ route('student.practices-edit-content', $content->id) }}"
                                                               type="button"
                                                               class="btn btn-success btn-sm border-white">
                                                                <i class="fas fa-pen"></i>
                                                            </a>
                                                            <form
                                                                action="{{ route('student.practices-delete-content', $content->id) }}"
                                                                method="post"
                                                                style="display: inline-block">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                        class="btn btn bg-gradient-danger btn-sm border-white">
                                                                    <i
                                                                        class="fas fa-trash"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <p>
                                                            {!! $content->content !!}
                                                        </p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
