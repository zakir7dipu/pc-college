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
                        <div class="table-responsive style-scroll">
                            <table id="slider" class="table dac_table table-striped table-bordered miw-500" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th width="5%">{{__('SL')}}</th>
                                    <th width="10%">{{__('Date')}}</th>
                                    <th width="10%">{{__('Name')}}</th>
                                    <th width="10%">{{__('Email')}}</th>
                                    <th width="10%">{{__('Phone')}}</th>
                                    <th width="50%">{{__('Message')}}</th>
                                    <th width="5%">{{__('Options')}}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach ($contactMessages as $key => $message)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{$message->created_at->format('M d, Y h:i a')}}</td>
                                        <td>{{$message->contact_name}}</td>
                                        <td>{{$message->email}}</td>
                                        <td>{{$message->contact_phone}}</td>
                                        <td>{{$message->contact_message}}</td>
                                        <td>
                                            <div class="d-flex">
                                                @if(!$message->replyMessage)
                                                    <button type="button" class="btn btn-sm btn btn-success m-1 contactMessageReplyBtn rounded" data-id="{{ $message->id }}">{{ __('Reply') }}</button>
                                                @else
                                                    <button type="button" class="btn btn-sm btn btn-info m-1 contactMessageReplyBtn rounded" data-id="{{ $message->id }}">{{ __('View') }}</button>
                                                @endif

                                            </div>
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

<!-- reply modal -->
    <div class="modal fade bd-example-modal-lg" id="replyMailModal" tabindex="-1" role="dialog" aria-labelledby="replyMailModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="replyMailModalLongTitle">{{ __('Reply Mail') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="replyMailForm">
                        @csrf
                        <p class="mb-1 font-weight-bold">{{__('To :')}}</p>
                        <div class="input-group input-group-lg mb-3">
                            <input type="email" name="to_email" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm" readonly
                                   placeholder="{{__('To Email')}}" value="">
                            <br>
                            @if ($errors->has('to_email'))
                                <span class="text-danger">{{ $errors->first('to_email') }}</span>
                            @endif
                        </div>

                        <p class="mb-1 font-weight-bold">{{__('On response :')}}</p>
                        <div class="form-group form-group-lg mb-3">
                            <textarea name="message" id="message" class="form-control" readonly></textarea>
                            <br>
                            @if ($errors->has('message'))
                                <span class="text-danger">{{ $errors->first('message') }}</span>
                            @endif
                        </div>

                        <p class="mb-1 font-weight-bold">{{__('Text :')}}</p>
                        <div class="form-group form-group-lg mb-3">
                            <textarea name="message_text" id="message" class="form-control" rows="10"></textarea>
                            <br>
                            @if ($errors->has('message_text'))
                                <span class="text-danger">{{ $errors->first('message_text') }}</span>
                            @endif
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    <button type="button" class="btn btn-danger submitBtn">{{ __('Send') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('backend/assets/js/contact-message/reply-contact-message.js') }}"></script>
@endsection
