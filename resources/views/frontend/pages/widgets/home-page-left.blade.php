<section class="col-lg-8 col-md-8 col-sm-12">
    <section class="d-flex pt-4">
            <div class="col-md-12 p-2">
                <div class="col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <img src="{{ asset('upload/avatar/young-man-with-glasses-avatar-character-TARBFT.jpg') }}" alt="" class="img img-fluid img-thumbnail rounded">
                            <h4>Md. Example</h4>
                        </div>
                        <div class="col-lg-8 col-md-12 statementText">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <span id="dots">... <small onclick="myFunction()" id="myBtn">Read more</small></span><span id="more">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span>
                            </p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-12">
                            <img src="{{ asset('upload/avatar/young-man-with-glasses-avatar-character-TARBFT.jpg') }}" alt="" class="img img-fluid img-thumbnail rounded">
                            <h4>Md. Example</h4>
                        </div>
                        <div class="col-lg-8 col-md-12 statementText">
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. <span id="dots">... <small onclick="myFunction()" id="myBtn">Read more</small></span><span id="more">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</span>
                            </p>

                        </div>
                    </div>
                </div>
            </div>
    </section>

    <h3 class="sectionTitle recreationsEventTitle"><span>PCAA Program News</span></h3>
    <section class="d-flex pt-4">
        @if($recreations)
            <div class="col-md-7 col-sm-12 p-2">
                <div class="col-12">
                    <a href="{{ route('recreation-event',$recreations[0]->id) }}"><img src="{{ asset($recreations[0]->image) }}" alt="Event Image"></a>
                    <div class="col-12 my-4 p-2">
                        <a href="{{ route('recreation-event',$recreations[0]->id) }}"><h5 class="m-0">{{ $recreations[0]->title }}</h5></a>
                        <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($recreations[0]->created_at)) }}</small>
                        <p>{{ \Str::limit(strip_tags($recreations[0]->description), 150).'..' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12">
                <div class="row">
                    @foreach($recreations as $key => $recreation)
                        @if($key!=0)
                            <a href="{{ route('recreation-event',$recreation->id) }}"><div class="col-12 p-2 d-flex event-item">
                                    <div class="col-4 p-0">
                                        <img src="{{ asset($recreation->image) }}" alt="" class="img-small img-thumbnail">
                                        <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($recreation->created_at)) }}</small>
                                    </div>
                                    <div class="col-8 p-1">
                                        <h6>{{ $recreation->title }}</h6>
                                    </div>
                                </div></a>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </section>

    <h3 class="sectionTitle executiveComityMeetingTitle mt-2"><span>Executive Committee Meeting</span></h3>
    <section class="d-flex pt-4">
        @if($executiveMeetings)
            <div class="col-md-7 col-sm-12 p-2">
                <div class="col-12">
                    <a href="{{ route('executive-meetings',$executiveMeetings[0]->id) }}"><img src="{{ asset($executiveMeetings[0]->image) }}" alt="Event Image"></a>
                    <div class="col-12 my-4 p-2">
                        <a href="{{ route('executive-meetings',$executiveMeetings[0]->id) }}"><h5 class="m-0">{{ $executiveMeetings[0]->title }}</h5></a>
                        <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($executiveMeetings[0]->created_at)) }}</small>
                        <p>{{ \Str::limit(strip_tags($executiveMeetings[0]->description), 150).'..' }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12">
                <div class="row">
                    @foreach($executiveMeetings as $key => $executiveMeeting)
                        @if($key!=0)
                            <a href="{{ route('executive-meetings',$executiveMeeting->id) }}"><div class="col-12 p-2 d-flex event-item">
                                    <div class="col-4 p-0">
                                        <img src="{{ asset($executiveMeeting->image) }}" alt="" class="img-small img-thumbnail">
                                        <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($executiveMeeting->created_at)) }}</small>
                                    </div>
                                    <div class="col-8 p-1">
                                        <h6>{{ $executiveMeeting->title }}</h6>
                                    </div>
                                </div></a>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
    </section>

    <h3 class="sectionTitle executiveComityMeetingTitle"><span>Media Coverage</span></h3>
    <section class="d-flex pt-4">
        @foreach($mediaCoverages as $mediaCoverage)
            <a href="{{ route('media-coverage', $mediaCoverage->id) }}" class="w-100">
                <div class="col-12 my-4 p-2 event-item">
                    <h5 class="m-0">{{ $mediaCoverage->title }}</h5>
                    <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($mediaCoverage->created_at)) }}</small>
                </div>
            </a>
        @endforeach
    </section>

    <h3 class="sectionTitle executiveComityMeetingTitle"><span>PCAA Scholarship</span></h3>
    <section class="d-flex pt-4">
        <div class="col-12 my-4 p-2">
            <a href="{{ route('farewells',$farewells[0]->id) }}"><img src="{{ asset($farewells[0]->image) }}" alt="Event Image"></a>
            <div class="col-12 my-4 p-2 event-item">
                <a href="{{ route('farewells',$farewells[0]->id) }}"><h5 class="m-0">{{ $farewells[0]->title }}</h5></a>
                <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($farewells[0]->created_at)) }}</small>
                <p>{{ \Str::limit(strip_tags($farewells[0]->description), 250).'..' }}</p>
            </div>
            @if($key!=0)
                @foreach($farewells as $farewell)
                    <a href="{{ route('farewells',$farewell->id) }}"><div class="col-12 my-4 p-2 event-item">
                            <div class="row">
                                <div class="col-4 p-0">
                                    <img src="{{ asset($farewell->image) }}" alt="" class="img-small img-thumbnail">
                                </div>
                                <div class="col-8 p-1">
                                    <h6>{{ $farewell->title }}</h6>
                                    <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($farewell->created_at)) }}</small>
                                </div>
                            </div>
                        </div></a>
                @endforeach
            @endif
        </div>
    </section>

    <h3 class="sectionTitle executiveComityMeetingTitle"><span>PCAA Documents</span></h3>
    <section class="d-flex pt-4">
        <div class="row">
            @foreach($blogs as $key => $blog)
                @if($key == 0)
                    <div class="col-md-6 col-sm-12">
                        <a href="{{ route('blog',$blog->id) }}"><img src="{{ asset($blog->image) }}" alt="Event Image"></a>
                        <div class="col-12 my-4 p-2 event-item">
                            <a href="{{ route('blog',$blog->id) }}"><h5 class="m-0">{{ $blog->title }}</h5></a>
                            <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($blog->created_at)) }}</small>
                            <p>{{ \Str::limit(strip_tags($blog->description), 150).'..' }}</p>
                        </div>
                    </div>
                @else
                    <div class="col-md-6 col-sm-12">
                        <a href="{{ route('blog',$blog->id) }}">
                            <div class="row">
                                <div class="col-4 p-0">
                                    <img src="{{ asset($blog->image) }}" alt="" class="img-small img-thumbnail">
                                    <i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($blog->created_at)) }}</small>
                                </div>
                                <div class="col-8 p-1">
                                    <h6>{{ $blog->title }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>

                @endif
            @endforeach
        </div>
    </section>
</section>
