@extends('layouts.admin')

@section('content')

                <!-- Info box -->
                <!-- ============================================================== -->
                <div class="row pt-3">
                    <!-- Column -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">THIS DAY</h5>
                                <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                                    <div id="sparklinedash"></div>
                                    <div class="">
                                        <h3 class="text-success"><i class="ti-arrow-up"></i> <span class="counter">{{ $income['day']['eur'] }} EUR</span></h3>
                                        <h3 class="text-success"><i class="ti-arrow-up"></i> <span class="counter">{{ $income['day']['usd'] }} USD</span></h3>
                                        <h3 class="text-success"><i class="ti-arrow-up"></i> <span class="counter">{{ $income['day']['rsd'] }} RSD</span></h3>
                                    </div>
                                </div>
                            </div>
                            <div id="sparkline8" class="sparkchart"></div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-4 col-md-6">
                    <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">THIS WEEK</h5>
                                <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                                    <div id="sparklinedash"></div>
                                    <div class="">
                                        <h3 class="text-success"><i class="ti-arrow-up"></i> <span class="counter">{{ $income['week']['eur'] }} EUR</span></h3>
                                        <h3 class="text-success"><i class="ti-arrow-up"></i> <span class="counter">{{ $income['week']['usd'] }} USD</span></h3>
                                        <h3 class="text-success"><i class="ti-arrow-up"></i> <span class="counter">{{ $income['week']['rsd'] }} RSD</span></h3>

                                    </div>
                                </div>
                            </div>
                            <div id="sparkline8" class="sparkchart"></div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-4 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">THIS MONTH</h5>
                                <div class="d-flex no-block align-items-center m-t-20 m-b-20">
                                    <div id="sparklinedash"></div>
                                    <div class="">
                                        <h3 class="text-success"><i class="ti-arrow-up"></i> <span class="counter">{{ $income['month']['eur'] }} EUR</span></h3>
                                        <h3 class="text-success"><i class="ti-arrow-up"></i> <span class="counter">{{ $income['month']['usd'] }} USD</span></h3>
                                        <h3 class="text-success"><i class="ti-arrow-up"></i> <span class="counter">{{ $income['month']['rsd'] }} RSD</span></h3>

                                    </div>
                                </div>
                            </div>
                            <div id="sparkline8" class="sparkchart"></div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                </div>


@stop