<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Рабочий план-график производственной практики</h3>
        <div class="card-tools">
            @role('student')
            @if($practice->plan->count() === 0)
                <a href="{{ route('student.practices-add-plan', $practice->id) }}" type="button"
                   class="btn btn-primary btn-sm">
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
                        @foreach($practice->plan as $plan)
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">
                                        <strong>{{ $plan->start }} - {{ $plan->end }}</strong>
                                    </h4>
                                    @role('student')
                                    <div class="card-tools">
                                        <a href="{{ route('student.practices-edit-plan', $plan->id) }}"
                                           type="button"
                                           class="btn btn-success btn-sm">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form
                                            action="{{ route('student.practices-delete-plan', $plan->id) }}"
                                            method="post"
                                            style="display: inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="btn btn bg-gradient-danger btn-sm">
                                                <i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                    @endrole
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
