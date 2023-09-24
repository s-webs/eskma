@extends('layout')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Поставить оценку</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <form action="{{ route('store-grade', $practiceId) }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Поставить оценку</label>
                            <input name="grade" type="number" class="form-control" id="exampleInputEmail1"
                                   placeholder="оценка" required>
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Поставить</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
