@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактировать Профиль | Edit profile</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->surname }} {{ $user->name }} {{ $user->patronymic }}
                        | {{ $user->email }}</h3>
                </div>


                <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Фамилия | Surname</label>
                            <input name="surname" type="email" class="form-control"
                                   placeholder="Enter surname" value="{{ $user->surname }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Имя | Name</label>
                            <input name="surname" type="email" class="form-control"
                                   placeholder="Enter name" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Отчество | Patronymic</label>
                            <input name="surname" type="email" class="form-control"
                                   placeholder="Enter patronymic" value="{{ $user->patronymic }}">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Сохранить | Save</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
