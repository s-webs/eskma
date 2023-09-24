<div class="card">
    <div class="card-body">
        <div class="my-2">
            <div class="my-2"><strong>Оценка преподавателя на
                    кафедре</strong> {{ $practice->teacher_grade }}</div>
            <div class="my-2"><strong>Оценка преподавателя на
                    базе</strong> {{ $practice->base_user_grade }}</div>
            <div class="my-2"><strong>Итоговая оценка</strong> {{ $practice->base_user_grade }}
            </div>
            <hr>
            <div class="my-2"><strong>
                    Отзыв студента</strong>
                @if(!isset($practice->student_review))
                    <i class="fas fa-times text-red"></i>
                @else
                    <i class="fas fa-check text-success"></i>
                @endif
            </div>
            <div class="my-2"><strong>
                    Отзыв преподавателя на кафедре</strong>
                @if(!isset($practice->teacher_review))
                    <i class="fas fa-times text-red"></i>
                @else
                    <i class="fas fa-check text-success"></i>
                @endif
            </div>
            <div class="my-2"><strong>
                    Отзыв преподавателя на базе</strong>
                @if(!isset($practice->base_user_review))
                    <i class="fas fa-times text-red"></i>
                @else
                    <i class="fas fa-check text-success"></i>
                @endif
            </div>
            <hr>
            <div class="my-2"><strong>
                    Подпись заведующего кафедрой</strong>
                @if($practice->head_of_department_signature === 0)
                    <i class="fas fa-times text-red"></i>
                @else
                    <i class="fas fa-check text-success"></i>
                @endif
            </div>
            <div class="my-2"><strong>
                    Подпись преподавателя на кафедре</strong>
                @if($practice->teacher_signature === 0)
                    <i class="fas fa-times text-red"></i>
                @else
                    <i class="fas fa-check text-success"></i>
                @endif
            </div>
            <div class="my-2"><strong>
                    Подпись преподавателя на базе</strong>
                @if($practice->base_user_signature === 0)
                    <i class="fas fa-times text-red"></i>
                @else
                    <i class="fas fa-check text-success"></i>
                @endif
            </div>
            <div class="my-2"><strong>
                    Подпись студента</strong>
                @if($practice->student_signature === 0)
                    <i class="fas fa-times text-red"></i>
                @else
                    <i class="fas fa-check text-success"></i>
                @endif
            </div>
        </div>
        <div class="my-3">
            @php
                $roles = ['head_of_department', 'teacher', 'base_user', 'student'];
            @endphp

            @foreach($roles as $role)
                @role($role)
                @if($practice->{$role.'_signature'} === 0)
                    <a wire:click="sign" class="btn btn-app bg-success" data-role="{{ $role }}">
                        <i class="fas fa-file-signature"></i> Поставить подпись
                    </a>
                @endif
                @endrole
            @endforeach

            @isset($practice->pdf_link)
                <a class="btn btn-app bg-primary">
                    <i class="fas fa-file-download"></i> Скачать отчет
                </a>
            @else
                @role('student')
                @if($practice->base_user_signature === 1 & $practice->teacher_signature === 1 & $practice->student_signature === 1 & $practice->head_of_department_signature === 1)
                    <a class="btn btn-app bg-primary">
                        <i class="fas fa-file-pdf"></i> Сформировать отчет
                    </a>

                @else
                    <button class="btn btn-app bg-primary disabled" disabled>
                        <i class="fas fa-file-pdf"></i> Сформировать отчет
                    </button>
                @endif
                @endrole
            @endisset
        </div>
    </div>
</div>
