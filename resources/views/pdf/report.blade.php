<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Отчет студента</title>
</head>
<style type="text/css" media="all">
    @page {
        margin: 3.5cm 1cm 1cm 1cm;
        border: 1px solid #000;
        size: auto;
        odd-header-name: html_header;
        even-header-name: html_header;
        odd-footer-name: html_footer;
        even-footer-name: html_footer;
    }

    body {
        font-family: "times", sans-serif !important;
    }

    .table {
        border: 1px solid #000;
        font-size: 12pt;
    }

    .table div {
        margin: 0;
    }

    .table_body_list {
        border-top: 1px solid #000;
    }

    .table_head_list div, .table_body_list div {
        padding: 0 0.5%;
    }

    .table_head_item1, .table_body_item1 {
        float: left;
        width: 5%;
    }

    .table_head_item2, .table_body_item2 {
        float: left;
        width: 57%;
    }

    .table_head_item3 {
        float: left;
        width: 25%;
    }

    .table_body_item3 {
        width: 25%;
    }

    .table_body_item3 div {
        float: left;
        width: 49%;
        text-align: center;

        padding: 0 0;
    }

    .table_head_item4, .table_body_item4 {
        float: left;
        width: 7%;
    }

    .table_body_item4 {
        word-break: break-all;
        font-size: 10pt;
        width: 6%;
    }

    .table_head_item3 {
        padding: 0 0;
    }

    .table_head_item3 .date {
        border-top: 1px solid #000;
    }

    .table_head_item3 .date div {
        float: left;
        width: 48%;
        text-align: center;
    }

    .table_head_item3 .date .date1 {
        border-right: 1px solid #000;
    }

    .clearfix::after {
        content: "";
        clear: both;
        display: table;
    }

    .t-center {
        text-align: center;
    }

    .t-upper {
        text-transform: uppercase;
    }

    .front_page_content_top {
        margin-top: 150px;
    }

    .front_page_content_info {
        margin-top: 50px;
    }

    .page {
        page-break-after: always;
        margin-bottom: 3cm;
    }

    .page:last-child {
        page-break-after: avoid;
    }

    .report {
        margin-top: 50px;
    }

    .qr_img {
        margin-left: 10px;
    }
</style>
<body>
<htmlpageheader name="header">
    {{--    <div class="header" style="text-align: center; width: 100%; height: auto; margin-top: 1cm;">--}}
    {{--        <img src="{{public_path('img/pdf-header.png')}}" width="100%" height="64px" style="border: 1px solid #000;"/>--}}
    {{--        <div class="clearfix"--}}
    {{--             style="height: 36px; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">--}}
    {{--            <div style="float: left; width: 80%; border-right: 1px solid #000; font-size: 10pt;">--}}
    {{--                <div--}}
    {{--                    style="text-align: center; ">{{__('report.chair')}} {{ $student->group->chair->getName(session()->get('locale')) }}</div>--}}
    {{--                <div--}}
    {{--                    style="text-align: center; border-top: 1px solid #000;">{{__('report.industrialPracticeDiary')}}</div>--}}
    {{--            </div>--}}

    {{--            <div></div>--}}
    {{--        </div>--}}
    {{--    </div>--}}
    ТУТ БУДЕТ HEADER
</htmlpageheader>

<htmlpagefooter name="footer">
    {{--    <div style="text-align: left; margin-bottom: 1cm;">{{__('report.practiceBaseHeadSignature')}}:--}}
    {{--        @foreach ($practiceBaseReviews as $practiceBaseReview)--}}
    {{--            @if ($practiceBaseReview->signature)--}}
    {{--                <img src="{{public_path($practiceBaseReviewQrs[$loop->index])}}" class="qr_img" alt=""/>--}}
    {{--            @else--}}
    {{--                {{__('report.noSignature')}}--}}
    {{--            @endif--}}
    {{--        @endforeach--}}
    {{--    </div>--}}
    ТУТ БУДЕТ ФУТЕР
</htmlpagefooter>

<div class="page">
    <div class="t-center front_page_content_top">
        <div class="t-upper"><strong>Дневник</strong></div>
        <div><strong>о прохождении производственной практики</strong></div>
        <div><strong>«{{ $practice->title }}»</strong></div>
    </div>
    <div class="front_page_content_info">
        <div>Факультет: «{{ $practice->student->group->educationProgram->name_ru }}»</div>
        <br>
        <div>
            Обучающийся: {{ $practice->student->user->surname }} {{ $practice->student->user->name }} {{ $practice->student->user->patronymic }}</div>
        <br>
        <div>
            Учебный год: {{ $practice->practice->academicYear->start }}-{{ $practice->practice->academicYear->end }} гг.
            Группа: {{ $practice->student->group->title }}
        </div>
        <br>
        <div>Дата прохождения практики: {{ $practice->practice->start }} - {{ $practice->practice->end }}</div>
        <br>
        <div>Специалист по практике от
            ЮКМА: {{ $practice->practice->teacher->user->surname }} {{ $practice->practice->teacher->user->name }} {{ $practice->practice->teacher->user->patronymic }}</div>
        <br>
    </div>
</div>

<div class="page report">
    <div class="t-center"><strong>Рабочий план-график производственной практики</strong></div>

    <div class="table">
        <div class="table_head">
            <div class="table_head_list clearfix">
                <div class="table_head_item1 t-center">№/<br>п</div>
                <div class="table_head_item2 t-center"
                     style="border-right: 1px solid #000; border-left: 1px solid #000">Перечень работ, подлежащих
                    выполнению (изучению) в соответствии с рабочей программой производственной практики
                </div>
                <div class="table_head_item3" style="border-right: 1px solid #000">
                    <div class="t-center">Сроки выполнения программы практики</div>
                    <div class="date">
                        <div class="date1">начало</div>
                        <div>завершение</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table_body">
            @foreach ($practice->plan as $plan)
                <div class="table_body_list clearfix">
                    <div class="table_body_item1">{{ ++$loop->index }}</div>
                    <div class="table_body_item2"
                         style="border-left: 1px solid #000; border-right: 1px solid #000;">{!! $plan->content !!}
                    </div>
                    <div class="table_body_item3">
                        <div>{{ $plan->start }}</div>
                        <div>{{ $plan->end }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="t-center"><strong>Содержание производственной практики</strong></div>

    <div class="table">
        <div class="table_head">
            <div class="table_head_list clearfix">
                <div class="table_head_item1 t-center">№/<br>п</div>
                <div class="table_head_item2 t-center"
                     style="border-right: 1px solid #000; border-left: 1px solid #000">Наименование и содержание
                    выполненных (изученых) работ в соответствии с рабочей программой производственной практики за каждый
                    день
                </div>
                <div class="table_head_item3" style="border-right: 1px solid #000">
                    <div class="t-center">Сроки выпол. отдельных тем, работ практики</div>
                    <div class="date">
                        <div class="date1">начало</div>
                        <div>завершение</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table_body">
            @foreach ($practice->content as $content)
                <div class="table_body_list clearfix">
                    <div class="table_body_item1">{{ ++$loop->index }}</div>
                    <div class="table_body_item2"
                         style="border-left: 1px solid #000; border-right: 1px solid #000;">{!! $content->content !!}</div>
                    <div class="table_body_item3">
                        <div>{{ $content->start }}</div>
                        <div>{{ $content->end }}</div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div>1. Отчет студента</div>
    <div>{!! $practice->student_review !!}</div>
    <div>Подпись обучающегося
        @if ($practice->student_signature)
            <strong>Имеется</strong>
        @else
            <strong>Подпись не поставлена</strong>
        @endif
    </div>
    <div>2. Отзыв руководителя практики в базе</div>
    <div>{!! $practice->base_user_review !!}</div>
    <div>Оценка на базе практики: {{ $practice->base_user_grade }}%</div>
    <div>3. Отзыв руководителя на кафедре</div>
    <div>{!! $practice->teacher_review !!}</div>
    <div>Оценка на кафедре: {{ $practice->teacher_grade }}%</div>
    <div>Итоговая оценка практики: {{ $practice->total_grade }}%</div>
    <div>Подпись руководителя на практике
        {{ $practice->practice->teacher->user->surname }}
        {{ $practice->practice->teacher->user->name }}
        {{ $practice->practice->teacher->user->patronymic }}
        @if ($practice->base_user_signature)
            Имеется
        @else
            Подпись не поставлена
        @endif
    </div>
</div>
</body>
</html>
