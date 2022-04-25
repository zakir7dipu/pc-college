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
                                    @if($key!=0)
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

                <h3 class="sectionTitle executiveComityMeetingTitle"><span>Executive Committee Meeting</span></h3>
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
                                    @if($key!=0)
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

                <h3 class="sectionTitle executiveComityMeetingTitle"><span>Media Coverage</span></h3>
                <section class="d-flex pt-4">
                    @foreach($mediaCoverages as $mediaCoverage)
                        <div class="col-12 my-4 p-2 event-item">
                            <h5 class="m-0">{{ $mediaCoverage->title }}</h5>
                            <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($mediaCoverage->created_at)) }}</small>
                        </div>
                    @endforeach
                </section>

                <h3 class="sectionTitle executiveComityMeetingTitle"><span>DUAA Scholarship</span></h3>
                <section class="d-flex pt-4">
                    <div class="col-12 my-4 p-2">
                        <img src="{{ asset($farewells[0]->image) }}" alt="Event Image">
                        <div class="col-12 my-4 p-2 event-item">
                            <h5 class="m-0">{{ $farewells[0]->title }}</h5>
                            <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($farewells[0]->created_at)) }}</small>
                            <p>{{ \Str::limit(strip_tags($farewells[0]->description), 250).'..' }}</p>
                        </div>
                        @if($key!=0)
                        @foreach($farewells as $farewell)
                            <div class="col-12 my-4 p-2 event-item">
                                <div class="row">
                                    <div class="col-4 p-0">
                                        <img src="{{ asset($farewell->image) }}" alt="" class="img-small img-thumbnail">
                                    </div>
                                    <div class="col-8 p-1">
                                        <h6>{{ $farewell->title }}</h6>
                                        <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($farewell->created_at)) }}</small>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </section>

                <h3 class="sectionTitle executiveComityMeetingTitle"><span>DUAA Documents</span></h3>
                <section class="d-flex pt-4">
                    <div class="row">
                        @foreach($blogs as $key => $blog)
                            @if($key == 0)
                                <div class="col-md-6 col-sm-12">
                                    <img src="{{ asset($blog->image) }}" alt="Event Image">
                                    <div class="col-12 my-4 p-2 event-item">
                                        <h5 class="m-0">{{ $blog->title }}</h5>
                                        <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($blog->created_at)) }}</small>
                                        <p>{{ \Str::limit(strip_tags($blog->description), 150).'..' }}</p>
                                    </div>
                                </div>
                            @else
                                <div class="col-md-6 col-sm-12">
                                    <div class="row">
                                        <div class="col-4 p-0">
                                            <img src="{{ asset($blog->image) }}" alt="" class="img-small img-thumbnail">
                                            <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($blog->created_at)) }}</small>
                                        </div>
                                        <div class="col-8 p-1">
                                            <h6>{{ $blog->title }}</h6>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>
            </section>
            <section class="col-lg-4 col-md-4 col-sm-12 contentRight">

                <h3 class="sectionTitle executiveComityMeetingTitle"><span>Upcoming Events</span></h3>
                <section class="pt-4">
                    <img src="{{ asset($event->image) }}" alt="Event Image">
                    <div class="col-12 my-4 p-2">
                        <h5 class="m-0">{{ $event->title }}</h5>
                        <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($event->created_at)) }}</small>
                        <p>{{ \Str::limit(strip_tags($event->description), 150).'..' }}</p>
                    </div>
                </section>

                <h3 class="sectionTitle executiveComityMeetingTitle mt-3"><span>Hot Link Numbers</span></h3>
                <section class="pt-4 text-center">
                    <img src="{{ asset('upload/settings/2020-01-29-15-38-1110062e77cba2e7d935d46121912483.jpg') }}" alt="" class="img-fluid img-thumbnail" style="width: 80%; height: 70%;">
                </section>

                <h3 class="sectionTitle executiveComityMeetingTitle mt-3"><span>Upcoming Events</span></h3>
                <section class="pt-4">
                    @if($notices)
                        @foreach($notices as $key => $notice)
                            @if($key == 0)
                                <img src="{{ asset($notice->image) }}" alt="Event Image">
                                <div class="col-12 my-4 p-2">
                                    <h5 class="m-0">{{ $notice->title }}</h5>
                                    <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($notice->created_at)) }}</small>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-4 p-0">
                                        <img src="{{ asset($notice->image) }}" alt="" class="img-small img-thumbnail">
                                        <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($notice->created_at)) }}</small>
                                    </div>
                                    <div class="col-8 p-1">
                                        <h6>{{ $notice->title }}</h6>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                </section>
            </section>
        </div>
    </section>
@endsection

@section('page-script')

    <script src="{{asset('frontend/js/video-carousel.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.touchSwipe.min.js')}}"></script>

@endsection

