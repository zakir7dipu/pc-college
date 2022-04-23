@extends('frontend.layouts.master-layout')

@section('title', config('app.name', 'laravel'). ' | '.$title)

@section('page-css')
    <style>
        .img-small {
            width: 100%;
            height: 65%;
        }
        .event-item {
            box-sizing: border-box;
            box-shadow: 1px 1.5px 2px rgba(0,0,0,.5);
            border-radius: 3px;
        }
        .sectionTitle {
            font-size: 16px;
            margin-bottom: 15px;
            padding-bottom: 0;
            font-family: 'Nunito', sans-serif;
            font-weight: 400;
        }
        .sectionTitle span {
            padding: 13px 10px 3px 10px;
            display: inline-block;
            border-radius: 3px 3px 0px 0px;
        }
        .recreationsEventTitle {
            border-bottom: 2px solid #81d742;
        }
        .recreationsEventTitle span {
            background-color:#81d742;
            color: #ffffff;
        }
        .executiveComityMeetingTitle {
            border-bottom: 2px solid #000000;
        }
        .executiveComityMeetingTitle span {
            background-color:#000000;
            color: #ffffff;
        }
    </style>
@endsection

@section('content')
    <section class="container homeBanner">
        <img class="my-5" src="{{ asset('upload/settings/Mujib-100-Banner__Final-1.jpg') }}" alt="">
    </section>

    <section class="container homeContents">
        <div class="row">
            <section class="col-lg-8 col-md-8 col-sm-12">
                <h3 class="sectionTitle recreationsEventTitle"><span>DUAA Program News</span></h3>
                <section class="d-flex pt-4">
                    @if($recreations)
                        <div class="col-md-7 col-sm-12 p-2">
                            <div class="col-12">
                                <img src="{{ asset($recreations[0]->image) }}" alt="Event Image">
                                <div class="col-12 my-4 p-2">
                                    <h5 class="m-0">{{ $recreations[0]->title }}</h5>
                                    <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($recreations[0]->created_at)) }}</small>
                                    <p>{{ \Str::limit(strip_tags($recreations[0]->description), 150).'..' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <div class="row">
                                @foreach($recreations as $key => $recreation)
                                    @if($key>=0)
                                        <div class="col-12 p-2 d-flex event-item">
                                            <div class="col-4 p-0">
                                                <img src="{{ asset($recreation->image) }}" alt="" class="img-small img-thumbnail">
                                                <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($recreation->created_at)) }}</small>
                                            </div>
                                            <div class="col-8 p-1">
                                                <h6>{{ $recreation->title }}</h6>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </section>

                <h3 class="sectionTitle executiveComityMeetingTitle"><span>DUAA Program News</span></h3>
                <section class="d-flex pt-4">
                    @if($executiveMeetings)
                        <div class="col-md-7 col-sm-12 p-2">
                            <div class="col-12">
                                <img src="{{ asset($executiveMeetings[0]->image) }}" alt="Event Image">
                                <div class="col-12 my-4 p-2">
                                    <h5 class="m-0">{{ $executiveMeetings[0]->title }}</h5>
                                    <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($executiveMeetings[0]->created_at)) }}</small>
                                    <p>{{ \Str::limit(strip_tags($executiveMeetings[0]->description), 150).'..' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <div class="row">
                                @foreach($executiveMeetings as $key => $executiveMeeting)
                                    @if($key>=0)
                                        <div class="col-12 p-2 d-flex event-item">
                                            <div class="col-4 p-0">
                                                <img src="{{ asset($executiveMeeting->image) }}" alt="" class="img-small img-thumbnail">
                                                <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($executiveMeeting->created_at)) }}</small>
                                            </div>
                                            <div class="col-8 p-1">
                                                <h6>{{ $executiveMeeting->title }}</h6>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif
                </section>
            </section>
            <section class="col-lg-4 col-md-4 col-sm-12 bg-success contentRight">
                hi
            </section>
        </div>
    </section>
@endsection

@section('page-script')

    <script src="{{asset('frontend/js/video-carousel.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.touchSwipe.min.js')}}"></script>

@endsection

