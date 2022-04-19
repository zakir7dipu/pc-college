@extends('backend.layouts.master-layout')

@section('title', config('app.name', 'laravel'). ' | '.$title)

@section('page-css')

@endsection

@section('content')
    <!-- WRAPPER CONTENT ----------------------------------------------------------------------------->
    <div id="wrapper-content">

        <div class="container-fluid">

            <div class="row">
                <div class="col">
                    <nav class="breadcrumb justify-content-sm-start justify-content-center text-center text-light bg-dark ">
                        <a class="breadcrumb-item text-white" href="{{  route('admin.dashboard') }}">{{ __('Home') }}</a>
                        <span class="breadcrumb-item active">{{ __($title) }}</span>
                        <span class="breadcrumb-info" id="time"></span>
                    </nav>
                </div>
            </div>

{{--            <div class="row">--}}
{{--                <div class="col-xl-3 col-sm-6">--}}
{{--                    <div class="card card-dark bg-danger">--}}
{{--                        <div class="card-body d-flex">--}}
{{--                            <i class="display-2 fas fa-users"></i>--}}
{{--                            <div class="ml-auto align-self-center text-right">--}}
{{--                                <span class="card-title mb-1">{{ __('users') }}</span>--}}
{{--                                <h3 class="card-title font-montserrat mb-0">{{__($allUsers)}}</h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-xl-3 col-sm-6">--}}
{{--                    <div class="card card-dark bg-dark">--}}
{{--                        <div class="card-body d-flex">--}}
{{--                            <i class="display-2 fas fa-user-shield"></i>--}}
{{--                            <div class="ml-auto align-self-center text-right">--}}
{{--                                <span class="card-title mb-1">{{ __('Admins') }}</span>--}}
{{--                                <h3 class="card-title font-montserrat mb-0">{{__($allAdmin)}}</h3>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-xl-3 col-sm-6">--}}
{{--                    <div class="card card-dark bg-info">--}}
{{--                        <div class="card-body d-flex">--}}
{{--                            <i class="display-2 fas fa-user-tie"></i>--}}
{{--                            <div class="ml-auto align-self-center text-right">--}}
{{--                                <span class="card-title mb-1">{{ __('Customers') }}</span>--}}
{{--                                <h3 class="card-title font-montserrat mb-0">{{__($allCustomer)}}</h3>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="col-xl-3 col-sm-6">--}}
{{--                    <div class="card card-dark bg-primary">--}}
{{--                        <div class="card-body d-flex">--}}
{{--                            <i class="display-2 fas fa-wallet"></i>--}}
{{--                            <div class="ml-auto align-self-center text-right">--}}
{{--                                <span class="card-title mb-1">{{ __('Total sales') }}</span>--}}
{{--                                <h3 class="card-title font-montserrat mb-0">{{ number_format($totalSales,2,'.',',') }}</h3>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="row">
                <div class="col-lg-6 col-sm-6">
                    <div class="card card-dark bg-dark card-justify">
                        <div class="box-weather">
                            <div class="weather-info">
                                <input type="text" class="form-control-search" id="search-contact" placeholder="Search Place ..."/>
                                <i class="material-icons">search</i>
                            </div>

                            <div class="weather-info justify-content-between text-center">
                                <div>
                                    <h5><i class="wi wi-sunrise"></i></h5>
                                    <h6 class="font-montserrat"><small>06:30</small></h6>
                                </div>
                                <div>
                                    <h5><i class="wi wi-sunset"></i></h5>
                                    <h6 class="font-montserrat"><small>19:30</small></h6>

                                </div>
                                <div>
                                    <h5><i class="wi wi-strong-wind"></i></h5>
                                    <h6 class="font-montserrat"><small>10KM/H</small></h6>
                                </div>
                                <div>
                                    <h5><i class="wi wi-raindrop"></i></h5>
                                    <h6 class="font-montserrat"><small>8MM</small></h6>
                                </div>
                            </div>

                            <div class="weather-info  border-bottom">
                                <div>
                                    <h6><small class="font-montserrat">CALIFORNIA, USA</small></h6>
                                    <h2 class="text-danger font-montserrat font-weight-normal">20° / 18C</h2>
                                </div>
                                <span class="display-3 border-left pl-3">
                                    <i class="wi wi-day-sunny"></i>
                                </span>
                            </div>


                            <ul class="weather-list">
                                <li class="weather-item">
                                    <div class="weather-day">09:00</div>
                                    <div class="weather-value">24°C</div>
                                    <div class="weather-icon"><i class="wi wi-day-hail"></i></div>
                                </li>
                                <li class="weather-item">
                                    <div class="weather-day">09:30</div>
                                    <div class="weather-value">26°C</div>
                                    <div class="weather-icon"><i class="wi wi-day-cloudy"></i></div>
                                </li>
                                <li class="weather-item">
                                    <div class="weather-day">10:00</div>
                                    <div class="weather-value">28°C</div>
                                    <div class="weather-icon"><i class="wi wi-day-cloudy"></i></div>
                                </li>
                                <li class="weather-item">
                                    <div class="weather-day">10:30</div>
                                    <div class="weather-value">32°C</div>
                                    <div class="weather-icon"><i class="wi wi-day-sunny "></i></div>
                                </li>
                                <li class="weather-item">
                                    <div class="weather-day">11:00</div>
                                    <div class="weather-value">30°C</div>
                                    <div class="weather-icon"><i class="wi wi wi-day-sunny-overcast"></i></div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card card-justify">
                        <div id="calendar_dark"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER CONTENT ------------------------------------------------------------------------->
@endsection

@section('page-script')

@endsection
