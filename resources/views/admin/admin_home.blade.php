@extends('layouts.admin_layouts')
@section('content')

    <div class="page-title">
        <div>
            <h1><i class="fa fa-pie-chart"></i> Dashboard</h1>

        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li><a href="#">Dashboard</a></li>
            </ul>
        </div>
    </div>
    <div class="row">

        <div class="col-md-6">
            <div class="card">
                <h3 class="card-title">Statues</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6">
             <div class="card">
                 <h3 class="card-title">Radar Chart</h3>
                 <div class="embed-responsive embed-responsive-16by9">
                     <canvas class="embed-responsive-item" id="radarChartDemo"></canvas>
                 </div>
             </div>
         </div>--}}
        {{-- <div class="col-md-6">
             <div class="card">
                 <h3 class="card-title">Polar Chart</h3>
                 <div class="embed-responsive embed-responsive-16by9">
                     <canvas class="embed-responsive-item" id="polarChartDemo"></canvas>
                 </div>
             </div>
         </div>
         <div class="clearfix"></div>--}}
        <div class="col-md-6">
            <div class="card">
                <h3 class="card-title">Statistics</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
                </div>
            </div>
        </div>
        {{-- <div class="col-md-6">
             <div class="card">
                 <h3 class="card-title">Doughnut Chart</h3>
                 <div class="embed-responsive embed-responsive-16by9">
                     <canvas class="embed-responsive-item" id="doughnutChartDemo"></canvas>
                 </div>
             </div>
         </div>--}}
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Total Users</h4>
                    <p><b>{{$users}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-small info"><i class="icon fa fa-camera fa-3x"></i>
                <div class="info">
                    <h4>Total Selfies</h4>
                    <p><b>{{$selfies}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-small warning"><i class="icon fa fa-street-view fa-3x"></i>
                <div class="info">
                    <h4>Total Statues</h4>
                    <p><b>{{$statues}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="widget-small danger"><i class="icon fa fa-street-view fa-3x"></i>
                <div class="info">
                    <h4>Total Cities</h4>
                    <p><b>{{$cities}}</b></p>
                </div>
            </div>
        </div>

    </div>

    <!-- Javascripts-->
    <script src="/js/jquery-2.1.4.min.js"></script>
    @php($cc=0)
    <script type="text/javascript">
        var data = {
            //labels: ["Users", "Statues", "Cities", "Selfies"],
            labels: [@foreach($citiess as $city) "{{$city->name}}",@endforeach],
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',

            ],
            datasets: [
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [ @foreach($citiess as $city)
                            @foreach($statuess as $stat)
                                @if($city->city_id==$stat->city)@php($cc++) @endif
                            @endforeach
                        {{$cc}},
                        @php($cc=0)
                        @endforeach{{-- , {{$statues}},{{$cities}}, {{$selfies}}--}}]
                }
            ]
        };
        /*var pdata = [
            {
                value: '{{$statues}}',
                color: "#F7464A",
                highlight: "#FF5A5E",
                label: "Statues"
            },
            {
                value: '{{$cities}}',
                color: "#46BFBD",
                highlight: "#5AD3D1",
                label: "Cities"
            },
            {
                value: '{{$selfies}}',
                color: "#FDB45C",
                highlight: "#FFC870",
                label: "Selfies"
            }
        ]

*/
        var ctxb = $("#barChartDemo").get(0).getContext("2d");
        var barChart = new Chart(ctxb).Bar(data);

        /*  var ctxr = $("#radarChartDemo").get(0).getContext("2d");
          var barChart = new Chart(ctxr).Radar(data);*/

        /*      var ctxpo = $("#polarChartDemo").get(0).getContext("2d");
              var barChart = new Chart(ctxpo).PolarArea(pdata);*/



        var data2 = {
            labels: ["Users", "Statues", "Cities", "Selfies"],
            backgroundColor: [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)',

            ],
            datasets: [
                /* {
                     label: "My First dataset",
                     fillColor: "rgba(220,220,220,0.2)",
                     strokeColor: "rgba(220,220,220,1)",
                     pointColor: "rgba(220,220,220,1)",
                     pointStrokeColor: "#fff",
                     pointHighlightFill: "#fff",
                     pointHighlightStroke: "rgba(220,220,220,1)",
                     data: [5, 4, 3, 2]
                 },*/
                {
                    label: "My Second dataset",
                    fillColor: "rgba(151,187,205,0.2)",
                    strokeColor: "rgba(151,187,205,1)",
                    pointColor: "rgba(151,187,205,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(151,187,205,1)",
                    data: [{{$users}}, {{$statues}},{{$cities}}, {{$selfies}}]
                }
            ]
        };

        var ctxp = $("#pieChartDemo").get(0).getContext("2d");
        var barChart = new Chart(ctxp).Bar(data2);

        /*  var ctxd = $("#doughnutChartDemo").get(0).getContext("2d");
          var barChart = new Chart(ctxd).Doughnut(pdata);*/
    </script>

@endsection