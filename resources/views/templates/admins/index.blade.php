@extends('templates.admins.layout')
@section('content')
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
