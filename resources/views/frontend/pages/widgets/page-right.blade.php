<section class="col-lg-4 col-md-4 col-sm-12 contentRight">

    <h3 class="sectionTitle executiveComityMeetingTitle"><span>Upcoming Events</span></h3>
    <section class="pt-4">
        <a href="{{ route('event',$event->id) }}"><img src="{{ asset($event->image) }}" alt="Event Image"></a>
        <div class="col-12 my-4 p-2">
            <a href="{{ route('event',$event->id) }}"><h5 class="m-0">{{ $event->title }}</h5></a>
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
                    <a href="{{ route('notice',$notice->id) }}"><img src="{{ asset($notice->image) }}" alt="Event Image"></a>
                    <div class="col-12 my-4 p-2">
                        <a href="{{ route('notice',$notice->id) }}"><h5 class="m-0">{{ $notice->title }}</h5></a>
                        <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($notice->created_at)) }}</small>
                    </div>
                @else
                    <a href="{{ route('notice',$notice->id) }}"><div class="row">
                        <div class="col-4 p-0">
                            <img src="{{ asset($notice->image) }}" alt="" class="img-small img-thumbnail">
                            <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($notice->created_at)) }}</small>
                        </div>
                        <div class="col-8 p-1">
                            <h6>{{ $notice->title }}</h6>
                        </div>
                    </div></a>
                @endif
            @endforeach
        @endif
    </section>
</section>
