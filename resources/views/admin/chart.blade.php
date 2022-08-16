@extends('admin.layouts.master')
@section('title','نمودار')
@section('content')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">


        var analytics = {!! $data['user'] !!}

        console.log(analytics);

        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable(analytics);
            var options = {
                title: "",
                width: 600,
                height: 400,
            };
            var chart = new google.charts.Bar(document.getElementById('barchart_material'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>


    <div class="card" style="direction: ltr">
        <div class="card-header" style="text-align: right">
            <a href="{{ route('chart.export') }}" class="btn btn-success">خروجی اکسل</a>
            <a href="/dashboard" class="btn btn-success" style="text-align: left">بازگشت</a>
        </div>
        <div class="card-body">
            <div id="barchart_material">
            </div>
        </div>
    </div>

@endsection
