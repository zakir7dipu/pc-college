@extends('backend.layouts.master-layout')

@section('title', config('app.name', 'laravel').' | '.$title)

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
                    <div class="card-body">
                        <div class="row p-2">
                            @foreach($payments as $payment)
                                <div class="col-lg-2 col-md-m col-sm-4 text-center p-2" data-toggle="tooltip" data-placement="top" title="{{ ucwords(str_replace('_', ' ', $payment->name)) }}">
                                    <img src="{{ asset($payment->icon) }}" alt="{{ $payment->name }}" class="img img-fluid img-thumbnail w-100 cursor-pointer rounded border border-1 border-light paymentBtn {{ $payment->status?'active':'' }}" data-role="{{ route('admin.settings.payment.method', $payment->id) }}">
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="preloadModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        </div>
    </div>

@endsection

@section('page-script')
    <script src="{{ asset('backend/assets/js/payment-settings.js') }}"></script>
@endsection
