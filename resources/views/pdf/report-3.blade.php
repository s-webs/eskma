<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>{{$practice->practice->title}}</title>
</head>
<style type="text/css" media="all">
    @page {
        margin-top: 4.5cm;
        margin-left: 1cm;
        margin-right: 1cm;
        margin-header: 1cm;
        margin-footer: 1cm;
        margin-bottom: 3.5cm;
        border: 1px solid #000;
        size: auto;
        odd-header-name: html_header;
        even-header-name: html_header;
        odd-footer-name: html_footer;
        even-footer-name: html_footer;
    }
    * {
        font-family: "times", sans-serif !important;
    }
    .table div {
        margin: 0;
    }
    .table_body_item3 div {
        float: left;
        width: 49%;
        text-align: center;

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
    .table_body_content .table_body_item2,
    .table_head_content .table_head_item2 {
        width: 64.55%;
    }
    .table_body_content .table_body_item3,
    .table_head_content .table_head_item3 {
        width: 30.1%;
    }
</style>
<body>
<htmlpageheader name="header">
    <div class="header" style="text-align: center; width: 100%; height: auto; margin-top: 1cm;">
        <img src="{{public_path('assets/images/pdf-header.png')}}" width="100%" height="64px" style="border: 1px solid #000;" />
        <div class="clearfix" style="height: 36px; border-bottom: 1px solid #000; border-left: 1px solid #000; border-right: 1px solid #000;">
            <div style="float: left; width: 80%; border-right: 1px solid #000; font-size: 10pt;">
                <div style="text-align: center; ">{{__('report.chair')}} {{ $student->group->chair->getName(session()->get('locale')) }}</div>
                <div style="text-align: center; border-top: 1px solid #000;">{{__('report.industrialPracticeDiary')}}</div>
            </div>

            <div></div>
        </div>
    </div>
</htmlpageheader>

<htmlpagefooter name="footer">

</htmlpagefooter>

<div class="page">

</div>

<div class="page report">


    <div class="t-center" style="margin-top: 20px;"><strong>Содержание производственной практики</strong></div>

    <div class="table">
        <div class="table_head table_head_content">
            <div class="table_head_list clearfix">
                <div class="table_head_item1 t-center">№/<br>п</div>
                <div class="table_head_item2 t-center" style="border-right: 1px solid #000; border-left: 1px solid #000">Наименование и содержание выполненных (изученых) работ в соответствии с рабочей программой производственной практики за каждый день</div>
                <div class="table_head_item3" style="border-right: 1px solid #000; border-right: none;">
                    <div class="t-center" style="padding-left: 2%">Сроки выпол. отдельных тем, работ практики</div>
                    <div class="date">
                        <div class="date1">Начало</div>
                        <div class="t-center">Окончание</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="table_body table_body_content">
            @foreach ($practice->content as $content)
                chunk
                <div class="table_body_list clearfix">
                    <div class="table_body_item1 t-center">{{ ++$loop->index }}</div>
                    <div class="table_body_item2" style="border-left: 1px solid #000; border-right: 1px solid #000;">{!! $content->content !!}</div>
                    <div class="table_body_item3"><div>{{ $content->start }}</div> <div>{{ $content->end }}</div></div>
                </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
