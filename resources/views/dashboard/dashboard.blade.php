@extends('layouts.admin')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div id="crypto-stats-3" class="row">
                    <div class="col-xl-3 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc BTC warning font-large-2" title="BTC"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h6 class="text-muted">اجمالى المبيعات</h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>$9,980</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="btc-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc ETH blue-grey lighten-1 font-large-2" title="ETH"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h6 class="text-muted">اجمالي الطلبات</h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>$944</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="eth-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc XRP info font-large-2" title="XRP"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h6 class="text-muted">عدد المنتجات</h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>$1.2</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="xrp-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-12">
                        <div class="card crypto-card-3 pull-up">
                            <div class="card-content">
                                <div class="card-body pb-0">
                                    <div class="row">
                                        <div class="col-2">
                                            <h1><i class="cc XRP info font-large-2" title="XRP"></i></h1>
                                        </div>
                                        <div class="col-5 pl-2">
                                            <h6 class="text-muted">عدد العملاء</h6>
                                        </div>
                                        <div class="col-5 text-right">
                                            <h4>$1.2</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <canvas id="xrp-chartjs" class="height-75"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Candlestick Multi Level Control Chart -->

                <!-- Sell Orders & Buy Order -->
                <div class="row match-height">
                    <div class="col-12 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">أحدث الطلبات</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                        <tr>
                                            <th>رقم الطلب</th>
                                            <th>العميل</th>
                                            <th>السعر</th>
                                            <th>حالة الطلب</th>
                                            <th>الاجمالى</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">اخر التقيمات</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            </div>
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-de mb-0">
                                        <thead>
                                        <tr>
                                            <th>العميل </th>
                                            <th>المنتج</th>
                                            <th>التقييم</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Sell Orders & Buy Order -->
            </div>
        </div>
    </div>

@endsection

