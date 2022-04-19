@extends('backend.layouts.master-layout')

@section('title', config('app.name', 'laravel').' | '.$title)

@section('page-css')
    <link rel="stylesheet" href="{{ asset('backend/assets/plugin/bootstrap-select/bootstrap-select.min.css') }}">
@endsection

@section('content')
    <div id="wrapper-content">
        <div class="row">
            <div class="col">
                <nav class="breadcrumb justify-content-sm-start justify-content-center text-center text-light bg-dark ">
                    <a class="breadcrumb-item text-white" href="{{ route('admin.dashboard') }}">{{__('Home')}}</a>
                    <span class="breadcrumb-item active">{{__($title)}}</span>
                    <span class="breadcrumb-info" id="time"></span>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-12 mx-lg-auto">
                <div class="card card-dark bg-dark">
                    <div class="card-header">
                        <h6 class="card-title">{{__($title)}}</h6>
                    </div>
                    <form action="javascript:void(0)" method="POST" id="orderSettingsForm">
                            @csrf
                        <div class="card-body">

                        </div>
                        <div class="card-footer">
                            <div class="wizard-action text-left">
                                <button class="btn btn-wave-light btn-danger btn-lg" type="submit">{{__('Next')}}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-12 mx-lg-auto">
                <div class="card card-dark bg-dark">
                    <div class="card-header">
                        <h6 class="card-title">{{__('All selected areas')}}</h6>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            <span><b>{{ __('All Selected countries') }}: </b></span>
                            @foreach($countries as $country)
                                <span class="badge badge-primary p-2 h6">
                                    {{ $country->name }}
                                    <a href="{{ route('admin.settings.order-country-delete',$country->id) }}">&times;</a>
                                </span>
                            @endforeach
                        </div>

                        <div class="col-12">
                            <span><b>{{ __('All Selected States') }}: </b></span>
                            @foreach($sates as $sate)
                                <span class="badge badge-primary p-2 h6">{{ $sate->name }} <a href="{{ route('admin.settings.order-state-delete', $sate->id) }}">&times;</a></span>
                            @endforeach
                        </div>

                        <div class="col-12">
                            <span><b>{{ __('All Selected Police Station') }}: </b></span>
                            @foreach($policeStations as $policeStation)
                                <span class="badge badge-primary p-2 h6">{{ $policeStation->name }} <a href="{{ route('admin.settings.order-police-station-delete', $policeStation->id) }}">&times;</a></span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('backend/assets/plugin/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/order-area-picker.js') }}"></script>
@endsection
