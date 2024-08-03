@extends('layouts.admin')

@section('content')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="breadcrumb__content">
                        <div class="breadcrumb__content__left">
                            <div class="breadcrumb__title">
                                <h2>{{ __('Dashboard') }} </h2>
                            </div>
                        </div>
                        <div class="breadcrumb__content__right">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">{{ get_option('app_name') }}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ __('Dashboard') }}</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/principal.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-purple">{{ $total_users = 0 }}</h2>
                            <h3>{{ __('Total User') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/laptop.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-purple">{{ $total_catagories = 0 }}</h2>
                            <h3>{{ __('Total Catagories') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/study.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-blue">{{ $total_news = 0 }}</h2>
                            <h3>{{ __('Total News') }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/test.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-green">{{ $total_views = 0 }}</h2>
                            <h3>{{ __('Total View') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">

                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/test-1.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-blue">{{ $total_active_users = 0 }}</h2>
                            <h3>{{ __('Active User') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/download.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-purple">{{ $total_draft_news = 0 }}</h2>
                            <h3>{{ __('Draft News') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/withdraw.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-purple">{{ $total_active_news = 0 }}</h2>
                            <h3>{{ __('Active News') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/elearning.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-green">{{ $total_daily_readers = 0 }}</h2>
                            <h3>{{ __('Daily Readers') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/checklist.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-red">{{ $total_headings = 0 }}</h2>
                            <h3>{{ __('Total heading') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/website.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-red">{{ $total_videos = 0 }}</h2>
                            <h3>{{ __('Total Videos') }}</h3>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="status__box status__box__v3 bg-style">
                        <div class="status__box__img">
                            <img src="{{ asset('admin') }}/images/admin-dashboard-icons/blogger.png" alt="icon">
                        </div>
                        <div class="status__box__text">
                            <h2 class="color-yellow">{{ $total_blogs = 0 }}</h2>
                            <h3>{{ __('Total Blogs') }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="revenue__chart-v2__area bg-style">
                        <div class="revenue__chart-v2__top">
                            <div class="revenue__chart-v2__top__left">
                                <div class="content-title">
                                    <h2>{{ __('Readers statistics') }}</h2>
                                </div>
                            </div>
                            <div class="revenue__chart-v2__top__right">
                                <div class="revenue__chart-v2__list">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link" id="nav-two-tab" data-bs-toggle="tab" data-bs-target="#nav-two" type="button" role="tab"
                                                    aria-controls="nav-two" aria-selected="false">
                                                {{ __('Month') }}
                                            </button>
                                            <button class="nav-link active" id="nav-three-tab" data-bs-toggle="tab" data-bs-target="#nav-three" type="button" role="tab"
                                                    aria-controls="nav-three" aria-selected="false">
                                                {{ __('Year') }}
                                            </button>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="total-profit">
                            <h2>
                                {{ __('Total Statistic') }} <span>{{ $total_statistics = 0 }}</span>
                            </h2>
                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab">
                                <div id="chartMonth"></div>
                            </div>
                            <div class="tab-pane fade show active" id="nav-three" role="tabpanel" aria-labelledby="nav-three-tab">
                                <div id="chartYear"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sales-location__area bg-style">
                        <div class="sales-location__title">
                            <h2>{{ __('Top Seller') }}</h2>
                        </div>
                        <div class="sales-location__map">
                            <div id="topSellerChart" ></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')

    <script>

        'use strict'

        // Month
        var options = {
            series: [{
                name: 'Total Enroll students',
                data: @json($total_statistics)
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'year',
                categories: @json($totalMonths=0)
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chartMonth"), options);
        chart.render();

        // Year
        var options = {
            series: [{
                name: 'Total enroll students',
                data: @json($totalYearlyEnroll=0)
            }],
            chart: {
                height: 350,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'year',
                categories: @json($totalYears=0)
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var chart = new ApexCharts(document.querySelector("#chartYear"), options);
        chart.render();

        var options = {
            series: @json(@$allPercentage=0),
            chart: {
                type: 'donut',
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            },
            ],
            labels: @json(@$allName=0)
        };

        var chart = new ApexCharts(document.querySelector("#topSellerChart"), options);
        chart.render();

    </script>
@endpush
