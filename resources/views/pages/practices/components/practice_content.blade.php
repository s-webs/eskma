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
                                        @role('student')
                                        @if($practice->status === 1)
                                            <a href="{{ route('student.practices-edit-content', $content->id) }}"
                                               type="button"
                                               class="btn btn-success btn-sm">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <form
                                                action="{{ route('student.practices-delete-content', $content->id) }}"
                                                method="post"
                                                style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn bg-gradient-danger btn-sm">
                                                    <i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        @endif
                                        @endrole
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
