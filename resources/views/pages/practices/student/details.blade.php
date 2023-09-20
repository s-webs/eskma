@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Практика - {{ $practice->practice->title }}</h1>
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
                            <h3 class="card-title">Рабочий план-график производственной практики</h3>
                            <div class="card-tools">
                                <a href="{{ route('student.practices-add-plan', $practice->id) }}" type="button"
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
                                                                    <i
                                                                        class="fas fa-trash"></i></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <p>
                                                            {{ $plan->content }}
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
