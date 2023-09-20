<section class="content">
    <style>
        .loader {
            width: 100%;
            height: 4px;
            background-color: #0073e6;
            animation: loader 1.5s linear infinite;
        }

        @keyframes loader {
            0% {
                width: 0;
            }
            100% {
                width: 100%;
            }
        }

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
    <div class="row">
        <div class="col-12">
            <div class="input-group my-3">
                <input wire:model.live.debounce="search" type="search" class="form-control form-control-lg"
                       placeholder="Поиск по ФИО">
            </div>
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <div wire:loading wire:model="search" class="loader"></div>
                    @if(empty(!$students))
                        <table class="table table-hover text-nowrap">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Фамилия</th>
                                <th>Имя</th>
                                <th>Отчество</th>
                                <th>Группа</th>
                                <th>Email</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>
                                        {{ $student->user->surname }}
                                    </td>
                                    <td>
                                        {{ $student->user->name }}
                                    </td>
                                    <td>
                                        {{ $student->user->patronymic }}
                                    </td>
                                    <td>{{ $student->group->title }}</td>
                                    <td>{{ $student->user->email }}</td>
                                    <td class="text-right">
                                        <button wire:click="addStudent({{ $student->id }})" type="submit"
                                                wire:loading.attr="disabled" class="btn btn bg-gradient-primary btn-sm">
                                                <span wire:loading.remove>
                                                    <i class="fas fa-plus"></i>
                                                </span>
                                            <span wire:loading>
                                                    <i class="fas fa-spinner custom-spinner"></i>
                                                </span>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
                <div class="card-footer clearfix">
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
