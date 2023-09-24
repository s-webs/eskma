@role('teacher')
<div class="card">
    <div class="card-body">
        @if($practice->teacher_grade === 0)
            <a href="{{ route('add-grade', $practice->id) }}" class="btn btn-app bg-primary">
                <i class="fas fa-file-signature"></i> Поставить оценку
            </a>
        @endif
        @if($practice->total_grade === 0 & $practice->teacher_grade > 0 & $practice->base_user_grade > 0)
            <a href="{{ route('add-total-grade', $practice->id) }}" class="btn btn-app bg-primary">
                <i class="fas fa-file-signature"></i> Поставить итоговую оценку
            </a>
        @endif
        @if($practice->teacher_review === null)
            <a href="{{ route('add-review', $practice->id) }}" class="btn btn-app bg-primary">
                <i class="fas fa-file-signature"></i> Написать отзыв
            </a>
        @endif
    </div>
</div>
@endrole

@role('base_user')
<div class="card">
    <div class="card-body">
        @if($practice->base_user_grade === 0)
            <a href="{{ route('add-grade', $practice->id) }}" class="btn btn-app bg-success">
                <i class="fas fa-file-signature"></i> Поставить оценку
            </a>
        @endif
        @if($practice->base_user_review === null)
            <a href="{{ route('add-review', $practice->id) }}" class="btn btn-app bg-primary">
                <i class="fas fa-file-signature"></i> Написать отзыв
            </a>
        @endif
    </div>
</div>
@endrole

@role('student')
<div class="card">
    <div class="card-body">
        @if($practice->student_review === null)
            <a href="{{ route('add-review', $practice->id) }}" class="btn btn-app bg-primary">
                <i class="fas fa-file-signature"></i> Написать отзыв
            </a>
        @endif
    </div>
</div>
@endrole
