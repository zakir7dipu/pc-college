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
                    <a class="breadcrumb-item text-white" href="{{ route('admin.e-commerce.order.index') }}">{{__('All Orders')}}</a>
                    <span class="breadcrumb-item active text-capitalize">{{__($title)}}</span>
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
                                <h6 class="card-title">{{__($title)}}</h6>
                            </div>
                        </div>

                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 p-1">
                                <div class="col-12 border border-light p-2">
                                    <h4><u>{{ __('Order By') }}</u></h4>
                                    <p>
                                        {!! $order->user->name.'</br> -> '.'Email: '.$order->user->email.($order->user->profile?'</br> -> Phone'.$order->user->profile->phone.'</br> -> Company: '.$order->user->profile->company_name.'</br> -> Designation'.$order->user->profile->designation:'') !!}
                                    </p>
                                </div>
                                <div class="col-12 p-2">
                                    <form action="{{ route('admin.e-commerce.order.approval',$order->id) }}" method="post" id="productOrderApprovalForm">
                                        @csrf
                                        <p for="orderStatus">{{ __('Order Status') }}</p>
                                        <select name="order_status" id="orderStatus" title="Please select one" class="form-control">
                                            @foreach($orderPermissions as $permissions)
                                                <option {{ $order->order_status === $permissions->permission_code? 'selected':'' }} {{ $order->order_status >$permissions->permission_code? ($permissions->permission_code != 0?'disabled':($order->order_status === 4?'disabled':'')):''  }} {{ $order->order_status === 0?'disabled':'' }}  value="{{ $permissions->permission_code }}">{{ $permissions->name }}</option>
                                            @endforeach
                                        </select>
                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-4 d-lg-block d-md-none"></div>
                            <div class="col-lg-4 col-md-6 p-1">
                                <div class="col-12 border border-light p-2">
                                    <h4><u>{{ __('Shipping Address') }}</u></h4>
                                    <p>
                                        {!! $order->address->name.'</br> -> Phone: '.$order->address->phone.
($order->address->company?'</br> -> Company: '.$order->address->company:'').
($order->address->street_address?'</br> -> Street Address: '.$order->address->street_address:'').($order->address->police_station?'</br> -> Police Station: '.$order->address->police_station:'').($order->address->state?'</br> -> State: '.$order->address->state:'').($order->address->country?'</br> -> Country: '.$order->address->country.'-':'').($order->address->postal_code?$order->address->postal_code.' ':'') !!}
                                    </p>
                                    <p><b>{!! '-> Payment Method: '.$order->payment.($order->payment_trx?'</br> -> TRX: '.$order->payment_trx:'').'</br> -> Payment status: '.($order->payment_status?'Payed':($order->payment != 'Cash on delivery'?'Not paid yet.':'Cash on delivery')) !!}</b></p>
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <h4 class="text-center">
                                    <u>{{ __('Ordered Items') }}</u>
                                    <br>
                                    <a href="{{ route('invoice',$order->id) }}" target="_blank">
                                        <button type="button" class="btn btn-info rounded my-3"><i class="fas fa-file-invoice fa-2x"></i></button>
                                    </a></h4>
                                <table class="table table-hover">
                                   <thead>
                                   <tr>
                                       <th>{{ __('SL No') }}</th>
                                       <th>{{ __('Description') }}</th>
                                       <th>{{ __('Unit') }}</th>
                                       <th>{{ __('Price') }}</th>
                                   </tr>
                                   </thead>
                                    <tbody>
                                    @php
                                        $defaultCurrency = '';
                                    @endphp
                                    @foreach($order->product as $key => $product)
                                        @if($product->product)
                                            <tr>
                                                <th>{{ $key+1 }}</th>
                                                <td>{!! $product->product->name.(strlen(trim($product->specification)) > 0?'</br> -> '.$product->specification:'') !!}</td>
                                                <td>{{ $product->qty.' '.$product->product->unit_name }}
                                                <td>{{ $product->product->currency->symbol.' '.$product->price_qty }}</td>
                                            </tr>
                                            {{ $defaultCurrency = $product->product->currency->symbol }}
                                        @else
                                            <td>
                                                {{ __('Product was deleted by admin...') }}
                                            </td>
                                        @endif


                                    @endforeach
                                    <tr class="h6">
                                        <td colspan="3" class="text-right">{{ __('Sub-Total') }}</td>
                                        <td>{{ $defaultCurrency.' '.$order->price }}</td>
                                    </tr>
                                    @if($order->shipping_status && $order->shipping)
                                        <tr class="h6">
                                            <td colspan="3" class="text-right">{{ __('Shipping') }}</td>
                                            <td>{{ $defaultCurrency.' '.$order->shipping }}</td>
                                        </tr>
                                    @endif
                                    @if($order->shipping_status && $order->shipping)
                                        <tr class="h6">
                                            <td colspan="3" class="text-right">{{ __('Shipping') }}</td>
                                            <td>{{ $defaultCurrency.' '.$order->shipping }}</td>
                                        </tr>
                                    @endif
                                    <tr class="h6">
                                        <td colspan="3" class="text-right">{{ __('Total') }}</td>
                                        <td>{{ $defaultCurrency.' '.number_format(((str_replace(',','',$order->price) + str_replace(',','',$order->shipping)) - str_replace(',','',$order->discount)),2,".",",") }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{asset('backend/assets/js/tables-datatable.js')}}"></script>
    <script src="{{ asset('backend/assets/js/order-status.js') }}"></script>
@endsection
