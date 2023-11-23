@extends('layouts.admin')
@section('main')
    <div class="pagetitle">
        <h1>Report Automation</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active">Report Automation</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datatables</h5>
                        <p>Add lightweight datatables to your project with using the <a
                                href="https://github.com/fiduswriter/Simple-DataTables" target="_blank">Simple
                                DataTables</a> library. Just add <code>.datatable</code> class name to any table you wish to
                            conver to a datatable</p>

                        <!-- Table with stripped rows -->
                        <div class="table-responsive">
                            <table class="table table-hover datatable ">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">squad</th>
                                        <th scope="col">service</th>
                                        <th scope="col">environment</th>
                                        <th scope="col">total feature</th>
                                        <th scope="col">total scenario</th>
                                        <th scope="col">total success</th>
                                        <th scope="col">total pending</th>
                                        <th scope="col">total failed</th>
                                        <th scope="col">sucess rate</th>
                                        <th scope="col">duration</th>
                                        <th scope="col">created at</th>
                                        <th scope="col">updated at</th>
                                        <th scope="col">deleted at</th>
                                        <th scope="col"><a href="#">actiont</a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $report)
                                        <tr>
                                            <th scope="row">{{ $report['id'] }}</th>
                                            <td>{{ $report['squad'] }}</td>
                                            <td>{{ $report['service'] }}</td>
                                            <td>{{ $report['environment'] }}</td>
                                            <td>{{ $report['total_feature'] }}</td>
                                            <td>{{ $report['total_scenario'] }}</td>
                                            <td>{{ $report['total_success'] }}</td>
                                            <td>{{ $report['total_pending'] }}</td>
                                            <td>{{ $report['total_failed'] }}</td>
                                            <td>{{ $report['sucess_rate'] }}</td>
                                            <td>{{ $report['duration'] }}</td>
                                            <td>{{ $report['created_at'] }}</td>
                                            <td>{{ $report['updated_at'] }}</td>
                                            <td>{{ $report['deleted_at'] }}</td>
                                            <td><a href="{{ $report['url_report'] }}" target="_blank">view report</a></td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>

    </section>

    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Bar Chart</h5>

                        <!-- Bar Chart -->
                        <canvas id="barChart" style="max-height: 400px;"></canvas>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {

                                const service = `{!! implode(',', $chart_service) !!}`;
                                const array_service = service.split(',');

                                const total_scenario = `{!! implode(',', $chart_total_scenario) !!}`;
                                const array_total_scenario = total_scenario.split(',');


                                console.log(array_service);
                                console.log(array_total_scenario);

                                new Chart(document.querySelector('#barChart'), {
                                    type: 'bar',
                                    data: {
                                        labels: array_service,
                                        datasets: [{
                                            label: 'Total Scenario',
                                            data: array_total_scenario,
                                            backgroundColor: [
                                                'rgba(255, 99, 132, 0.2)',
                                                'rgba(255, 159, 64, 0.2)',
                                                'rgba(255, 205, 86, 0.2)',
                                                'rgba(75, 192, 192, 0.2)',
                                                'rgba(54, 162, 235, 0.2)',
                                                'rgba(153, 102, 255, 0.2)',
                                                'rgba(201, 203, 207, 0.2)'
                                            ],
                                            borderColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(255, 159, 64)',
                                                'rgb(255, 205, 86)',
                                                'rgb(75, 192, 192)',
                                                'rgb(54, 162, 235)',
                                                'rgb(153, 102, 255)',
                                                'rgb(201, 203, 207)'
                                            ],
                                            borderWidth: 1
                                        }]
                                    },
                                    options: {
                                        scales: {
                                            y: {
                                                beginAtZero: true
                                            }
                                        },
                                        responsive: true,
                                        maintainAspectRatio: false,
                                    }
                                });
                            });
                        </script>
                        <!-- End Bar CHart -->

                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pie Chart</h5>

                        <!-- Pie Chart -->
                        <canvas id="pieChart" style="max-height: 400px;"></canvas>
                        <script>
                            document.addEventListener("DOMContentLoaded", () => {

                                const service = `{!! implode(',', $chart_service) !!}`;
                                const array_service = service.split(',');

                                const total_scenario = `{!! implode(',', $chart_total_scenario) !!}`;
                                const array_total_scenario = total_scenario.split(',');

                                new Chart(document.querySelector('#pieChart'), {
                                    type: 'pie',
                                    data: {
                                        labels: array_service,
                                        datasets: [{
                                            label: 'Total Scenario',
                                            data: array_total_scenario,
                                            backgroundColor: [
                                                'rgb(255, 99, 132)',
                                                'rgb(255, 159, 64)',
                                                'rgb(255, 205, 86)',
                                                'rgb(75, 192, 192)',
                                                'rgb(54, 162, 235)',
                                                'rgb(153, 102, 255)',
                                                'rgb(201, 203, 207)'
                                            ],
                                            hoverOffset: 4
                                        }]
                                    }
                                });
                            });
                        </script>
                        <!-- End Pie CHart -->

                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">



                    <div class="card-body">
                        <h5 class="card-title">Gradient Chart <span>/Today</span></h5>

                        <!-- Line Chart -->
                        <div id="reportsChart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                new ApexCharts(document.querySelector("#reportsChart"), {
                                    series: [{
                                        name: 'Sales',
                                        data: [31, 40, 28, 51, 42, 82, 56],
                                    }, {
                                        name: 'Revenue',
                                        data: [11, 32, 45, 32, 34, 52, 41]
                                    }, {
                                        name: 'Customers',
                                        data: [15, 11, 32, 18, 9, 24, 11]
                                    }],
                                    chart: {
                                        height: 350,
                                        type: 'area',
                                        toolbar: {
                                            show: false
                                        },
                                    },
                                    markers: {
                                        size: 4
                                    },
                                    colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                    fill: {
                                        type: "gradient",
                                        gradient: {
                                            shadeIntensity: 1,
                                            opacityFrom: 0.3,
                                            opacityTo: 0.4,
                                            stops: [0, 90, 100]
                                        }
                                    },
                                    dataLabels: {
                                        enabled: false
                                    },
                                    stroke: {
                                        curve: 'smooth',
                                        width: 2
                                    },
                                    xaxis: {
                                        type: 'datetime',
                                        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z",
                                            "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z",
                                            "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z",
                                            "2018-09-19T06:30:00.000Z"
                                        ]
                                    },
                                    tooltip: {
                                        x: {
                                            format: 'dd/MM/yy HH:mm'
                                        },
                                    }
                                }).render();
                            });
                        </script>
                        <!-- End Line Chart -->

                    </div>

                </div>
            </div><!-- End Reports -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Area Chart</h5>

                        <!-- Area Chart -->
                        <div id="areaChart"></div>

                        <script>
                            document.addEventListener("DOMContentLoaded", () => {
                                const series = {
                                    "monthDataSeries1": {
                                        "prices": [
                                            8107.85,
                                            8128.0,
                                            8122.9,
                                            8165.5,
                                            8340.7,
                                            8423.7,
                                            8423.5,
                                            8514.3,
                                            8481.85,
                                            8487.7,
                                            8506.9,
                                            8626.2,
                                            8668.95,
                                            8602.3,
                                            8607.55,
                                            8512.9,
                                            8496.25,
                                            8600.65,
                                            8881.1,
                                            9340.85
                                        ],
                                        "dates": [
                                            "13 Nov 2017",
                                            "14 Nov 2017",
                                            "15 Nov 2017",
                                            "16 Nov 2017",
                                            "17 Nov 2017",
                                            "20 Nov 2017",
                                            "21 Nov 2017",
                                            "22 Nov 2017",
                                            "23 Nov 2017",
                                            "24 Nov 2017",
                                            "27 Nov 2017",
                                            "28 Nov 2017",
                                            "29 Nov 2017",
                                            "30 Nov 2017",
                                            "01 Dec 2017",
                                            "04 Dec 2017",
                                            "05 Dec 2017",
                                            "06 Dec 2017",
                                            "07 Dec 2017",
                                            "08 Dec 2017"
                                        ]
                                    },
                                    "monthDataSeries2": {
                                        "prices": [
                                            8423.7,
                                            8423.5,
                                            8514.3,
                                            8481.85,
                                            8487.7,
                                            8506.9,
                                            8626.2,
                                            8668.95,
                                            8602.3,
                                            8607.55,
                                            8512.9,
                                            8496.25,
                                            8600.65,
                                            8881.1,
                                            9040.85,
                                            8340.7,
                                            8165.5,
                                            8122.9,
                                            8107.85,
                                            8128.0
                                        ],
                                        "dates": [
                                            "13 Nov 2017",
                                            "14 Nov 2017",
                                            "15 Nov 2017",
                                            "16 Nov 2017",
                                            "17 Nov 2017",
                                            "20 Nov 2017",
                                            "21 Nov 2017",
                                            "22 Nov 2017",
                                            "23 Nov 2017",
                                            "24 Nov 2017",
                                            "27 Nov 2017",
                                            "28 Nov 2017",
                                            "29 Nov 2017",
                                            "30 Nov 2017",
                                            "01 Dec 2017",
                                            "04 Dec 2017",
                                            "05 Dec 2017",
                                            "06 Dec 2017",
                                            "07 Dec 2017",
                                            "08 Dec 2017"
                                        ]
                                    },
                                    "monthDataSeries3": {
                                        "prices": [
                                            7114.25,
                                            7126.6,
                                            7116.95,
                                            7203.7,
                                            7233.75,
                                            7451.0,
                                            7381.15,
                                            7348.95,
                                            7347.75,
                                            7311.25,
                                            7266.4,
                                            7253.25,
                                            7215.45,
                                            7266.35,
                                            7315.25,
                                            7237.2,
                                            7191.4,
                                            7238.95,
                                            7222.6,
                                            7217.9,
                                            7359.3,
                                            7371.55,
                                            7371.15,
                                            7469.2,
                                            7429.25,
                                            7434.65,
                                            7451.1,
                                            7475.25,
                                            7566.25,
                                            7556.8,
                                            7525.55,
                                            7555.45,
                                            7560.9,
                                            7490.7,
                                            7527.6,
                                            7551.9,
                                            7514.85,
                                            7577.95,
                                            7592.3,
                                            7621.95,
                                            7707.95,
                                            7859.1,
                                            7815.7,
                                            7739.0,
                                            7778.7,
                                            7839.45,
                                            7756.45,
                                            7669.2,
                                            7580.45,
                                            7452.85,
                                            7617.25,
                                            7701.6,
                                            7606.8,
                                            7620.05,
                                            7513.85,
                                            7498.45,
                                            7575.45,
                                            7601.95,
                                            7589.1,
                                            7525.85,
                                            7569.5,
                                            7702.5,
                                            7812.7,
                                            7803.75,
                                            7816.3,
                                            7851.15,
                                            7912.2,
                                            7972.8,
                                            8145.0,
                                            8161.1,
                                            8121.05,
                                            8071.25,
                                            8088.2,
                                            8154.45,
                                            8148.3,
                                            8122.05,
                                            8132.65,
                                            8074.55,
                                            7952.8,
                                            7885.55,
                                            7733.9,
                                            7897.15,
                                            7973.15,
                                            7888.5,
                                            7842.8,
                                            7838.4,
                                            7909.85,
                                            7892.75,
                                            7897.75,
                                            7820.05,
                                            7904.4,
                                            7872.2,
                                            7847.5,
                                            7849.55,
                                            7789.6,
                                            7736.35,
                                            7819.4,
                                            7875.35,
                                            7871.8,
                                            8076.5,
                                            8114.8,
                                            8193.55,
                                            8217.1,
                                            8235.05,
                                            8215.3,
                                            8216.4,
                                            8301.55,
                                            8235.25,
                                            8229.75,
                                            8201.95,
                                            8164.95,
                                            8107.85,
                                            8128.0,
                                            8122.9,
                                            8165.5,
                                            8340.7,
                                            8423.7,
                                            8423.5,
                                            8514.3,
                                            8481.85,
                                            8487.7,
                                            8506.9,
                                            8626.2
                                        ],
                                        "dates": [
                                            "02 Jun 2017",
                                            "05 Jun 2017",
                                            "06 Jun 2017",
                                            "07 Jun 2017",
                                            "08 Jun 2017",
                                            "09 Jun 2017",
                                            "12 Jun 2017",
                                            "13 Jun 2017",
                                            "14 Jun 2017",
                                            "15 Jun 2017",
                                            "16 Jun 2017",
                                            "19 Jun 2017",
                                            "20 Jun 2017",
                                            "21 Jun 2017",
                                            "22 Jun 2017",
                                            "23 Jun 2017",
                                            "27 Jun 2017",
                                            "28 Jun 2017",
                                            "29 Jun 2017",
                                            "30 Jun 2017",
                                            "03 Jul 2017",
                                            "04 Jul 2017",
                                            "05 Jul 2017",
                                            "06 Jul 2017",
                                            "07 Jul 2017",
                                            "10 Jul 2017",
                                            "11 Jul 2017",
                                            "12 Jul 2017",
                                            "13 Jul 2017",
                                            "14 Jul 2017",
                                            "17 Jul 2017",
                                            "18 Jul 2017",
                                            "19 Jul 2017",
                                            "20 Jul 2017",
                                            "21 Jul 2017",
                                            "24 Jul 2017",
                                            "25 Jul 2017",
                                            "26 Jul 2017",
                                            "27 Jul 2017",
                                            "28 Jul 2017",
                                            "31 Jul 2017",
                                            "01 Aug 2017",
                                            "02 Aug 2017",
                                            "03 Aug 2017",
                                            "04 Aug 2017",
                                            "07 Aug 2017",
                                            "08 Aug 2017",
                                            "09 Aug 2017",
                                            "10 Aug 2017",
                                            "11 Aug 2017",
                                            "14 Aug 2017",
                                            "16 Aug 2017",
                                            "17 Aug 2017",
                                            "18 Aug 2017",
                                            "21 Aug 2017",
                                            "22 Aug 2017",
                                            "23 Aug 2017",
                                            "24 Aug 2017",
                                            "28 Aug 2017",
                                            "29 Aug 2017",
                                            "30 Aug 2017",
                                            "31 Aug 2017",
                                            "01 Sep 2017",
                                            "04 Sep 2017",
                                            "05 Sep 2017",
                                            "06 Sep 2017",
                                            "07 Sep 2017",
                                            "08 Sep 2017",
                                            "11 Sep 2017",
                                            "12 Sep 2017",
                                            "13 Sep 2017",
                                            "14 Sep 2017",
                                            "15 Sep 2017",
                                            "18 Sep 2017",
                                            "19 Sep 2017",
                                            "20 Sep 2017",
                                            "21 Sep 2017",
                                            "22 Sep 2017",
                                            "25 Sep 2017",
                                            "26 Sep 2017",
                                            "27 Sep 2017",
                                            "28 Sep 2017",
                                            "29 Sep 2017",
                                            "03 Oct 2017",
                                            "04 Oct 2017",
                                            "05 Oct 2017",
                                            "06 Oct 2017",
                                            "09 Oct 2017",
                                            "10 Oct 2017",
                                            "11 Oct 2017",
                                            "12 Oct 2017",
                                            "13 Oct 2017",
                                            "16 Oct 2017",
                                            "17 Oct 2017",
                                            "18 Oct 2017",
                                            "19 Oct 2017",
                                            "23 Oct 2017",
                                            "24 Oct 2017",
                                            "25 Oct 2017",
                                            "26 Oct 2017",
                                            "27 Oct 2017",
                                            "30 Oct 2017",
                                            "31 Oct 2017",
                                            "01 Nov 2017",
                                            "02 Nov 2017",
                                            "03 Nov 2017",
                                            "06 Nov 2017",
                                            "07 Nov 2017",
                                            "08 Nov 2017",
                                            "09 Nov 2017",
                                            "10 Nov 2017",
                                            "13 Nov 2017",
                                            "14 Nov 2017",
                                            "15 Nov 2017",
                                            "16 Nov 2017",
                                            "17 Nov 2017",
                                            "20 Nov 2017",
                                            "21 Nov 2017",
                                            "22 Nov 2017",
                                            "23 Nov 2017",
                                            "24 Nov 2017",
                                            "27 Nov 2017",
                                            "28 Nov 2017"
                                        ]
                                    }
                                }
                                new ApexCharts(document.querySelector("#areaChart"), {
                                    series: [{
                                        name: "STOCK ABC",
                                        data: series.monthDataSeries1.prices
                                    }],
                                    chart: {
                                        type: 'area',
                                        height: 350,
                                        zoom: {
                                            enabled: false
                                        }
                                    },
                                    dataLabels: {
                                        enabled: false
                                    },
                                    stroke: {
                                        curve: 'straight'
                                    },
                                    subtitle: {
                                        text: 'Price Movements',
                                        align: 'left'
                                    },
                                    labels: series.monthDataSeries1.dates,
                                    xaxis: {
                                        type: 'datetime',
                                    },
                                    yaxis: {
                                        opposite: true
                                    },
                                    legend: {
                                        horizontalAlign: 'left'
                                    }
                                }).render();
                            });
                        </script>
                        <!-- End Area Chart -->

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
@endsection

@section('js')
@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            echarts.init(document.querySelector("#trafficChart")).setOption({
                tooltip: {
                    trigger: 'item'
                },
                legend: {
                    top: '5%',
                    left: 'center'
                },
                series: [{
                    name: 'Access From',
                    type: 'pie',
                    radius: ['40%', '70%'],
                    avoidLabelOverlap: false,
                    label: {
                        show: false,
                        position: 'center'
                    },
                    emphasis: {
                        label: {
                            show: true,
                            fontSize: '18',
                            fontWeight: 'bold'
                        }
                    },
                    labelLine: {
                        show: false
                    },
                    data: [{
                            value: 1048,
                            name: 'Search Engine'
                        },
                        {
                            value: 735,
                            name: 'Direct'
                        },
                        {
                            value: 580,
                            name: 'Email'
                        },
                        {
                            value: 484,
                            name: 'Union Ads'
                        },
                        {
                            value: 300,
                            name: 'Video Ads'
                        }
                    ]
                }]
            });
        });
    </script>
@endsection
