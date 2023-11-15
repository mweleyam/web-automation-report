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
