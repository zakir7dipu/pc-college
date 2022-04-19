@extends('backend.layouts.master-layout')

@section('title', $title)

@section('page-css')

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
            <div class="col-12">
                <div class="card card-dark bg-dark">
                    <div class="card-header">
                        <h6 class="card-title">{{__($title)}}</h6>
                    </div>
                    <div class="card-body ">
                        <form action="{{ route('admin.settings.api') }}" method="POST" enctype="multipart/form-data" class="wma-form">
                            @csrf
                            <h3 class="text-center font-weight-bold">{{ __('Google Login Settings') }}</h3>
                            <p class="mb-1">{{__('Client ID')}}: </p>
                            <div class="input-group input-group-lg mb-3">
                                <input type="text" name="google_client_id" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                       placeholder="{{__('Write your google client ID')}}" value="{{ env('GOOGLE_CLIENT_ID') }}">
                                <br>
                                @if ($errors->has('google_client_id'))
                                    <span class="text-danger">{{ $errors->first('google_client_id') }}</span>
                                @endif
                            </div>

                            <p class="mb-1">{{__('Client Secret')}}: </p>
                            <div class="input-group input-group-lg mb-3">
                                <input type="text" name="google_client_secret" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                       placeholder="{{__('Write your google client secret')}}" value="{{ env('GOOGLE_CLIENT_SECRET') }}">
                                <br>
                                @if ($errors->has('google_client_secret'))
                                    <span class="text-danger">{{ $errors->first('google_client_secret') }}</span>
                                @endif
                            </div>

                            <hr class="border-light my-5">

                            <h3 class="text-center font-weight-bold">{{ __('Facebook Login Settings') }}</h3>
                            <p class="mb-1">{{__('Client ID')}}: </p>
                            <div class="input-group input-group-lg mb-3">
                                <input type="text" name="facebook_client_id" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                       placeholder="{{__('Write your facebook client ID')}}" value="{{ env('FACEBOOK_CLIENT_ID') }}">
                                <br>
                                @if ($errors->has('facebook_client_id'))
                                    <span class="text-danger">{{ $errors->first('facebook_client_id') }}</span>
                                @endif
                            </div>

                            <p class="mb-1">{{__('Client Secret')}}: </p>
                            <div class="input-group input-group-lg mb-3">
                                <input type="text" name="facebook_client_secret" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                       placeholder="{{__('Write your facebook client secret')}}" value="{{ env('FACEBOOK_CLIENT_SECRET') }}">
                                <br>
                                @if ($errors->has('facebook_client_secret'))
                                    <span class="text-danger">{{ $errors->first('facebook_client_secret') }}</span>
                                @endif
                            </div>

                            <div class="wizard-action text-left">
                                <button class="btn btn-wave-light btn-danger btn-lg" type="submit">{{__('Submit form')}}</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('page-script')

@endsection
