<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="input-group my-3">
                <input wire:model.live.debounce.400ms="search" type="search" class="form-control form-control-lg"
                       placeholder="Поиск по ФИО">
            </div>
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Фамилия</th>
                            <th>Имя</th>
                            <th>Отчество</th>
                            <th>Группа</th>
                            <th>Email</th>
                            <th>Есть ли на этой практике</th>
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
                                {{ dump($student->practiceStudent) }}
                                <td class="text-right">
                                    {{--                                    @if($student->practiceStudent->count() > 0)--}}
                                    {{--                                        @foreach($student->practiceStudent as $current)--}}
                                    {{--                                            @if($current->practice_id == $practiceID)--}}
                                    {{--                                                <button wire:click="deleteStudent({{ $student->id }})" type="submit"--}}
                                    {{--                                                        class="btn btn bg-gradient-danger btn-sm"><i--}}
                                    {{--                                                        class="fas fa-trash"></i></button>--}}
                                    {{--                                            @endif--}}
                                    {{--                                        @endforeach--}}
                                    {{--                                    @else--}}
                                    <button wire:click="addStudent({{ $student->id }})" type="submit"
                                            class="btn btn bg-gradient-primary btn-sm">
                                        <i class="fas fa-plus"></i></button>
                                    {{--                                    @endif--}}
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $students->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
