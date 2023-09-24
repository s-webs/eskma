@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Профиль | Profile</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-widget widget-user">

                <div class="widget-user-header bg-info">
                    <h3 class="widget-user-username">{{ $user->surname }} {{ $user->name }} {{ $user->patronymic }}</h3>
                    <h5 class="widget-user-desc">
                        @role('superuser')
                        Superuser
                        @endrole
                        @role('admin')
                        Администратор
                        @endrole
                        @role('head_of_department')
                        Заведующий кафедрой
                        @endrole
                        @role('teacher')
                        Преподаватель
                        @endrole
                        @role('base_user')
                        Преподаватель на базе
                        @endrole
                        @role('student')
                        Студент
                        @endrole
                    </h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="/assets/images/avatar.png" alt="User Avatar">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-6 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{ $user->email }}</h5>
                                <span class="description-text">EMAIL</span>
                            </div>
                        </div>
                        <div class="col-sm-6 border-right">
                            @role('base_user')
                            <div class="description-block">
                                <h5 class="description-header">{{ $user->baseUser->base->name_ru }}</h5>
                                <span class="description-text">База практики</span>
                            </div>
                            @endrole
                            @role('teacher')
                            <div class="description-block">
                                <h5 class="description-header">{{ $user->teacher->department->name_ru }}</h5>
                                <span class="description-text">Кафедра</span>
                            </div>
                            @endrole
                            @role('head_of_department')
                            <div class="description-block">
                                <h5 class="description-header">{{ $user->headDepartment->department->name_ru }}</h5>
                                <span class="description-text">Кафедра</span>
                            </div>
                            @endrole
                            @role('student')
                            <div class="description-block">
                                <h5 class="description-header">{{ $user->student->group->title }}</h5>
                                <span class="description-text">Группа</span>
                            </div>
                            @endrole
                            <div class="description-block">
                                <h5 class="description-header"></h5>
                                <span class="description-text"></span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <a href="{{ route('profile.edit') }}" type="button"
                       class="btn btn-block btn-primary btn-lg">Редактировать</a>
                </div>
            </div>
        </div>
    </section>
@endsection
