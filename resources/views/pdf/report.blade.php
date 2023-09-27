<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Отчет студента</title>
</head>
<body>
<style>
    @page {
        margin: 3.7cm 1cm 1cm 1cm;
        border: 1px solid #000;
        size: auto;
    }

    * {
        font-family: 'dejavu sans', serif !important;
        font-size: 11px !important;
    }

    .page {
        page-break-after: always;
    }

    .page:last-child {
        page-break-after: avoid;
    }

    header {
        width: 100%;
        position: fixed;
        top: -90px;
        left: 0px;
        right: 0px;
        height: 50px;
        border: 1px solid #000;
    }

    table, th, td {
        border: 1px solid;
    }

    .practice-content-body, .practice-content-header {
        border: 1px solid #000;
    }

    .practice-content-header {
        font-size: 14px;
        font-weight: 700;
    }

    .practice-content-body img {
        width: 80px;
        height: auto;
    }

    .practice-content-body {
        padding: 5px;
    }
</style>
<header style="margin-bottom: 2cm;">
    <img src="{{ public_path('assets/images/pdf-header.png') }}" width="100%" height="64px"
         style="border: 1px solid #000;"/>
</header>
<div class="page">
    <div style="text-align: center">
        <div class="t-upper"><strong>Дневник</strong></div>
        <div><strong>о прохождении производственной практики</strong></div>
        <div><strong>«{{ $practice->practice->title }}»</strong></div>
    </div>
    <div class="front_page_content_info">
        <div><strong>Факультет:</strong> «{{ $practice->student->group->educationProgram->name_ru }}»</div>
        <br>
        <div>
            <strong>Обучающийся:</strong> {{ $practice->student->user->surname }} {{ $practice->student->user->name }} {{ $practice->student->user->patronymic }}
        </div>
        <br>
        <div>
            <strong>Учебный год:</strong> {{ $practice->practice->academicYear->start }}
            -{{ $practice->practice->academicYear->end }} гг.
            <strong>Группа:</strong> {{ $practice->student->group->title }}
        </div>
        <br>
        <div><strong>Дата прохождения практики:</strong> {{ $practice->practice->start }}
            - {{ $practice->practice->end }}</div>
        <br>
        <div><strong>Специалист по практике от
                ЮКМА:</strong> {{ $practice->practice->teacher->user->surname }} {{ $practice->practice->teacher->user->name }} {{ $practice->practice->teacher->user->patronymic }}
        </div>
        <br>
        <div><strong>Специалист по практике на
                базе:</strong> {{ $practice->practice->baseUser->user->surname }} {{ $practice->practice->baseUser->user->name }} {{ $practice->practice->baseUser->user->patronymic }}
        </div>
        <br>
        <div><strong>Оценка на кафедре:</strong> {{ $practice->teacher_grade }}</div>
        <br>
        <div><strong>Оценка на базе практики:</strong> {{ $practice->base_user_grade }}</div>
        <br>
        <div><strong>Итоговая оценка:</strong> {{ $practice->total_grade }}</div>
        <br>
        <br>
        <img src="{{ $qrAsset }}" alt="">
    </div>
</div>
<div class="page">
    <div style="border: 1px solid #000; text-align: center">
        <h3 class="card-title">Рабочий план-график производственной практики</h3>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-bordered text-nowrap">
            <thead>
            <tr>
                <th>№/<br>п</th>
                <th>Перечень работ, подлежащих
                    выполнению (изучению) в соответствии с рабочей программой производственной практики
                </th>
                <th>Сроки выполнения программы практики</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($practice->plan as $plan)
                <tr>
                    <td style="text-align: center">{{ ++$loop->index }}</td>
                    <td>{!! $plan->content !!}</td>
                    <td style="text-align: center">{{ $plan->start }} <br> - <br> {{ $plan->start }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="page">
    <div style="border: 1px solid #000; text-align: center">
        <h3 class="card-title">Содержание производственной практики</h3>
    </div>
    @foreach ($practice->content as $content)
        <div class="practice-content-header">
            №/п {{++$loop->index}}. Содержание производственной практики за {{ $content->start }} - {{ $content->end }}
        </div>
        <div class="practice-content-body">
            {!! $content->content !!}
        </div>
    @endforeach
</div>

<div class="page">
    <div style="border: 1px solid #000; text-align: center">
        <h3><strong>Отчет студента</strong></h3>
    </div>
    <div style="border: 1px solid #000; padding: 10px">{!! $practice->student_review !!}</div>
    <div>
        <div style="font-size: 20px; border: 1px solid #000; padding: 10px">
            <strong>Подпись обучающегося:</strong>
            {{ $practice->student->user->surname }}
            {{ $practice->student->user->name }}
            {{ $practice->student->user->patronymic }}
            @if ($practice->student_signature)
                <strong style="text-decoration: underline">Имеется</strong>
            @else
                <strong>Подпись не поставлена</strong>
            @endif
        </div>
    </div>
</div>

<div class="page">
    <div style="border: 1px solid #000; text-align: center">
        <h3 class="card-title"><strong>Отзыв руководителя практики в базе</strong></h3>
    </div>
    <div style="border: 1px solid #000; padding: 10px">{!! $practice->base_user_review !!}</div>
    <div style="font-size: 20px;">
        <div style="border: 1px solid #000; padding: 10px;">
            <strong>Оценка на базе практики:</strong> {{ $practice->base_user_grade }}%
        </div>
        <div style="border: 1px solid #000; padding: 10px;"><strong>Подпись руководителя на практике:</strong>
            {{ $practice->practice->baseUser->user->surname }}
            {{ $practice->practice->baseUser->user->name }}
            {{ $practice->practice->baseUser->user->patronymic }}
            @if ($practice->base_user_signature)
                <strong style="text-decoration: underline">Имеется</strong>
            @else
                Подпись не поставлена
            @endif
        </div>
    </div>
</div>

<div class="page">
    <div style="border: 1px solid #000; text-align: center">
        <h3 class="card-title">
            <strong>Отзыв руководителя на кафедре</strong>
        </h3>
    </div>
    <div style="border: 1px solid #000; padding: 10px">{!! $practice->teacher_review !!}</div>
    <div style="font-size: 20px;">
        <div style="border: 1px solid #000; padding: 10px;"><strong>Оценка на
                кафедре:</strong> {{ $practice->teacher_grade }}%
        </div>
        <div style="border: 1px solid #000; padding: 10px;">
            <strong>Итоговая оценка практики:</strong> {{ $practice->total_grade }}%
        </div>
        <div style="border: 1px solid #000; padding: 10px;"><strong>Подпись руководителя на кафедре:</strong>
            {{ $practice->practice->teacher->user->surname }}
            {{ $practice->practice->teacher->user->name }}
            {{ $practice->practice->teacher->user->patronymic }}
            @if ($practice->base_user_signature)
                <strong style="text-decoration: underline">Имеется</strong>
            @else
                Подпись не поставлена
            @endif
        </div>
    </div>
</div>
</body>
</html>
