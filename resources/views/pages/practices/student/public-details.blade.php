@extends('public-layout')
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
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
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
                    <div class="card">
                        @isset($practice->teacher_review)
                            <div class="modal fade" id="modal-teacher-review" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Отзыв преподавателя на кафедре</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>{!! $practice->teacher_review !!}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        @isset($practice->base_user_review)
                            <div class="modal fade" id="modal-base-review" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Отзыв преподавателя на базе</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>{!! $practice->base_user_review !!}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        @isset($practice->student_review)
                            <div class="modal fade" id="modal-student-review" style="display: none;" aria-hidden="true">
                                <div class="modal-dialog modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title">Отзыв студента</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>{!! $practice->student_review !!}</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endisset
                        <div class="card-body">
                            <div class="my-2">
                                <div class="my-2"><strong>Оценка преподавателя на
                                        кафедре</strong> {{ $practice->teacher_grade }}</div>
                                <div class="my-2"><strong>Оценка преподавателя на
                                        базе</strong> {{ $practice->base_user_grade }}</div>
                                <div class="my-2"><strong>Итоговая оценка</strong> {{ $practice->total_grade }}
                                </div>
                                <hr>
                                <div class="my-2"><strong>
                                        Отзыв студента</strong>
                                    @if(!isset($practice->student_review))
                                        <i class="fas fa-times text-red"></i>
                                    @else
                                        <button type="button" class="btn btn-outline-primary btn-xs" data-toggle="modal"
                                                data-target="#modal-student-review">Прочесть
                                        </button>
                                    @endif
                                </div>
                                <div class="my-2">
                                    <strong>Отзыв преподавателя на кафедре</strong>
                                    @if(!isset($practice->teacher_review))
                                        <i class="fas fa-times text-red"></i>
                                    @else
                                        <button type="button" class="btn btn-outline-primary btn-xs" data-toggle="modal"
                                                data-target="#modal-teacher-review">Прочесть
                                        </button>
                                    @endif
                                </div>
                                <div class="my-2">
                                    <strong>Отзыв преподавателя на базе</strong>
                                    @if(!isset($practice->base_user_review))
                                        <i class="fas fa-times text-red"></i>
                                    @else
                                        <button type="button" class="btn btn-outline-primary btn-xs" data-toggle="modal"
                                                data-target="#modal-base-review">Прочесть
                                        </button>
                                    @endif
                                </div>
                                <hr>
                                <div class="my-2">
                                    <strong>Подпись заведующего кафедрой</strong>
                                    @if($practice->head_of_department_signature === 0)
                                        <i class="fas fa-times text-red"></i>
                                    @else
                                        <i class="fas fa-check text-success"></i>
                                    @endif
                                </div>
                                <div class="my-2">
                                    <strong>Подпись преподавателя на кафедре</strong>
                                    @if($practice->teacher_signature === 0)
                                        <i class="fas fa-times text-red"></i>
                                    @else
                                        <i class="fas fa-check text-success"></i>
                                    @endif
                                </div>
                                <div class="my-2">
                                    <strong>Подпись преподавателя на базе</strong>
                                    @if($practice->base_user_signature === 0)
                                        <i class="fas fa-times text-red"></i>
                                    @else
                                        <i class="fas fa-check text-success"></i>
                                    @endif
                                </div>
                                <div class="my-2">
                                    <strong>Подпись студента</strong>
                                    @if($practice->student_signature === 0)
                                        <i class="fas fa-times text-red"></i>
                                    @else
                                        <i class="fas fa-check text-success"></i>
                                    @endif
                                </div>
                            </div>
                            <div class="my-3">
                                @if($practice->pdf_link !== null)
                                    <a href="/{{$practice->pdf_link}}" class="btn btn-app bg-primary">
                                        <i class="fas fa-file-download"></i> Скачать отчет
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Рабочий план-график производственной практики</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
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
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">
                                                            <strong>{{ $plan->start }} - {{ $plan->end }}</strong>
                                                        </h4>
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

                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Содержание производственной практики</h3>
                            <div class="card-tools">
                                @role('student')
                                @if($practice->status === 1)
                                    <a href="{{ route('student.practices-add-content', $practice->id) }}" type="button"
                                       class="btn btn-success btn-sm border-white">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                @endif
                                @endrole
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                        title="Collapse">
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
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4 class="card-title">
                                                            <strong>Содержание за ({{ $content->start }}
                                                                - {{ $content->end }})</strong>
                                                        </h4>
                                                        <div class="card-tools">
                                                            <button type="button"
                                                                    class="btn btn-warning btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#modal-xl-{{ $content->id }}">
                                                                <i class="fas fa-eye"></i>
                                                            </button>
                                                        </div>
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
