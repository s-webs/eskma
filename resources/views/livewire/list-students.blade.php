<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
        <thead>
        <tr>
            <th>ID</th>
            <th>Фио</th>
            <th>Email</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->student->user->surname }} {{ $student->student->user->name }} {{ $student->student->user->patronymic }}</td>
                <td>{{ $student->student->user->email }}</td>
                <td class="text-right">
                    <a href="{{ route('student.practices-details', $student->id) }}" type="button"
                       class="btn btn-primary btn-sm">
                        <i class="fas fa-eye"></i>
                    </a>
                    @role('teacher')
                    @if($practice->status === 1)
                        <button type="submit" wire:click="deleteItem({{ $student->id }})" wire:loading.attr="disabled"
                                class="btn btn bg-gradient-danger btn-sm">
                            <style>
                                .custom-spinner {
                                    transform: rotateX(0deg);
                                    animation: custom-spinner 0.9s linear infinite;
                                }

                                @keyframes custom-spinner {
                                    0% {
                                        transform: rotateX(0deg);
                                    }
                                    100% {
                                        transform: rotate(359deg);
                                    }
                                }
                            </style>
                            <span wire:loading.remove><i class="fas fa-trash"></i></span>
                            <span wire:loading><i class="fas fa-spinner custom-spinner"></i></span>
                        </button>
                    @endif
                    @endrole
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
