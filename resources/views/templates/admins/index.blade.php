@extends('templates.admins.layout')
@section('content')
<div class="main">
    <main class="content">
        <div class="container-fluid p-0">
            <!-- <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1> -->

            <div class="row" style="gap:20px;">
                <div class="col show-visitor text-view-visitor" style="background-color: aquamarine;padding-top:30px;padding-bottom:30px;text-align:center;margin: 0%
                                                                                ">
                    <h3>Truy cập hôm nay</h3>
                    <span id="visitor_views" style="font-size: 24px"></span>
                </div>
                <div class="col sale-by-date text-view-visitor" id="statis-view" style="background-color: aquamarine;padding-top:30px;padding-bottom:30px;text-align:center;margin: 0%;font-weight:bold">
                    <h3>Doanh thu hôm nay</h3><span style="font-size: 24px" id="numberMoney"></span> đ

                </div>
                <div class="col" style="background-color: aquamarine;padding-top:30px;padding-bottom:30px;text-align:center;margin: 0%;font-weight:bold; border-radius: 16px;">
                    <h3>Sản phẩm</h3>
                    <span style="font-size: 24px">{{$countProduct}}</span>
                </div>
                <div class="col" style="background-color: aquamarine;padding-top:30px;padding-bottom:30px;text-align:center;margin: 0%;font-weight:bold; border-radius: 16px;">
                    <h3>Đơn hàng hôm nay</h3>
                    <span style="font-size: 24px">{{$countOrder}}</span>
                </div>
            </div>
        </div>
        <div class="export-file">
            <!-- <button id="exportFile" class="btn btn-primary">xuất file exel</button> -->
        </div>
        <div class="row">
            <div class="col-12">
                <figure class="highcharts-figure">
                    <div id="container-staticbyyear" data-staticbyyear="{{$statisByYear}}" data-staticbyday="{{$statisByDay}}">
                    </div>
                </figure>
            </div>
            <div class="col-12">
                <figure class="highcharts-figure">
                    <div id="container-topproduct" data-topproduct="{{$topproduct}}"></div>
                </figure>
            </div>
        </div>
    </main>
</div>
@section('script')
<script src="https://code.highcharts.com/highcharts.js">
</script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://code.highcharts.com/modules/drilldown.js"></script>
<script type="text/javascript">
    let value = document.querySelector('#container-topproduct').getAttribute('data-topproduct');
    value = JSON.parse(value);
    Highcharts.chart('container-topproduct', {
        chart: {
            type: 'pie',
        },
        title: {
            text: 'TOP 5 SẢN PHẨM ĐƯỢC MUA NHỀU NHẤT',
            style: {
                fontSize: '20px'
            }
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.y}</b>',
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        fontSize: '14px',
                    }
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Số lượng',
            colorByPoint: true,
            data: value
        }]
    });

    const formatCurrency = (x) => {
        x = x.toLocaleString('it-IT', {
            style: 'currency',
            currency: 'VND'
        });
        return x;
    }
</script>
@stop
@stop
