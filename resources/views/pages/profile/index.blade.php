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
                    <h5 class="widget-user-desc">SUPERUSER</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle elevation-2" src="/assets/images/avatar.png" alt="User Avatar">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">{{ $user->email }}</h5>
                                <span class="description-text">EMAIL</span>
                            </div>
                        </div>
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">123-2023</h5>
                                <span class="description-text">GROUP | ГРУППА</span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">35</h5>
                                <span class="description-text">PRODUCTS</span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <a href="{{ route('profile.edit') }}" type="button"
                       class="btn btn-block btn-primary btn-lg">Редактировать
                        | Edit</a>
                </div>
            </div>
        </div>
    </section>
@endsection
