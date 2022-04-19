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
                    <form action="{{ route('admin.settings.sms') }}" method="POST" enctype="multipart/form-data" class="wma-form">
                        @csrf
                        <p class="mb-1">{{__('SMS API URL')}}: </p>
                        <div class="input-group input-group-lg mb-3">
                            <input type="text" name="url" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                placeholder="{{__('SMS API URL')}}" value="{{ env('SMS_API_URL') }}">
                            <br>
                            @if ($errors->has('url'))
                                <span class="text-danger">{{ $errors->first('url') }}</span>
                            @endif
                        </div>

                        <p class="mb-1">{{__('Auth Key')}}: </p>
                        <div class="input-group input-group-lg mb-3">
                            <input type="text" name="auth_key" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                placeholder="{{__('Auth Key')}}" value="{{ env('SMS_AUTH_KEY') }}">
                            <br>
                            @if ($errors->has('auth_key'))
                            <span class="text-danger">{{ $errors->first('auth_key') }}</span>
                            @endif
                        </div>

                        <p class="mb-1">{{__('Sender ID')}}: </p>
                        <div class="input-group input-group-lg mb-3">
                            <input type="text" name="sender_id" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                placeholder="{{__('Sender ID')}}" value="{{ env('SMS_SENDER_ID') }}">
                            <br>
                            @if ($errors->has('sender_id'))
                            <span class="text-danger">{{ $errors->first('sender_id') }}</span>
                            @endif
                        </div>

                        <p class="mb-1">{{__('Route')}}: </p>
                        <div class="input-group input-group-lg mb-3">
                            <input type="text" name="route" class="form-control " aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                placeholder="{{__('Route')}}" value="{{ env('SMS_ROUGHT') }}">
                            <br>
                            @if ($errors->has('route'))
                            <span class="text-danger">{{ $errors->first('route') }}</span>
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
