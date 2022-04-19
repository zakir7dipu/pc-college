@extends('backend.layouts.master-layout')

@section('title', $title)

@section('page-css')

@endsection

@section('content')

    <div id="wrapper-content">
        <div class="row">
            <div class="col">
                <nav class="breadcrumb justify-content-sm-start justify-content-center text-center text-light bg-dark ">
                    <a class="breadcrumb-item text-white" href="{{route('admin.dashboard')}}">{{__('Home')}}</a>
                    <span class="breadcrumb-item active">{{ __($title) }}</span>
                    <span class="breadcrumb-info" id="time"></span>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-dark bg-dark">

                    <div class="card-header d-block">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <h6 class="card-title lh-35">{{ __($title) }}</h6>
                            </div>
                            <div class="col-md-6 col-sm-12 text-right">
{{--                                <a href="{{ route('admin.supplier.create') }}" class="btn btn-danger btn-sm rounded"><i class="material-icons">add</i></a>--}}
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mx-5">
                                <div class="row my-5">
                                    <div class="col-4">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())

                                            <img class="rounded-circle" width="150" src="{{ $customer->profile_photo_url }}" alt="{{ $customer->name }}" />
                                        @else
                                            <img src="{{ asset('backend/assets/img/profile/male.jpg')  }}" class="rounded-circle " width="150">
                                        @endif
                                    </div>
                                    <div class="col-8">
                                        {!! $customer->name.'</br> -> '.'Email: '.$customer->email.($customer->profile?'</br> -> Phone'.$customer->profile->phone.'</br> -> Company: '.$customer->profile->company_name.'</br> -> Designation'.$customer->profile->designation:'') !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="table-responsive style-scroll">
                                    <table class="table table-striped table-bordered miw-500 dac_table" cellspacing="0" width="100%">
                                        <thead>
                                        <tr>
                                            <th width="5%">{{__('SL No.')}}</th>
                                            <th width="10%">{{__('Invoice No.')}}</th>
                                            <th width="10%">{{__('Name')}}</th>
                                            <th wirth="20%">{{__('Shipping Address')}}</th>
                                            <th wirth="45%">{{__('Products')}}</th>
                                            <th wirth="10%" class="text-center">{{__('Option')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($customer->orders()->orderBy('id','DESC')->get() as $key => $order)
                                            <tr>
                                                <th>{{ $key+1 }}</th>
                                                <td>{{ $order->invoice }}</td>
                                                <td>{!! $order->address->name.'</br>'.$order->address->phone !!}</td>
                                                <td>{!! ($order->address->company?$order->address->company.', ':'').($order->address->street_address?$order->address->street_address.', ':'').($order->address->police_station?$order->address->police_station.', ':'').($order->address->state?$order->address->state.', ':'').($order->address->country?$order->address->country.'-':'').($order->address->postal_code?$order->address->postal_code.' ':'') !!}</td>
                                                <td>
                                                    <table class="w-100 table-hover">
                                                        @foreach($order->product as $key => $product)
                                                            <tr class="border border-light">
                                                                @if($product->product)
                                                                    <td>{!! $product->product->name.'</br> -> '.(strlen(trim($product->specification)) > 0?$product->specification.'</br> -> ':'').$product->qty.' '.$product->product->unit_name.'</br> -> '.$product->product->currency->symbol.' '.$product->price_qty !!}</td>
                                                                @else
                                                                    <td>
                                                                        {{ __('Product was deleted by admin...') }}
                                                                    </td>
                                                                @endif
                                                            </tr>

                                                        @endforeach
                                                    </table>
                                                </td>
                                                <td>
                                                    @if($order->order_status === 0)
                                                        <p class="badge badge-danger">{{ __('Canceled') }}</p>
                                                    @elseif($order->order_status === 1)
                                                        <p class="badge badge-warning">{{ __('Pending') }}</p>
                                                    @elseif($order->order_status === 2)
                                                        <p class="badge badge-primary">{{ __('Approved') }}</p>
                                                    @elseif($order->order_status === 3)
                                                        <p class="badge badge-info">{{ __('Process to delivery') }}</p>
                                                    @elseif($order->order_status === 4)
                                                        <p class="badge badge-success">{{ __('Delivered') }}</p>
                                                    @endif

                                                    <a href="{{ route('admin.e-commerce.order.single',$order->id) }}">
                                                        <button type="button" class="btn btn-success btn-sm rounded">{{ __('View')  }}</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-script')

@endsection
