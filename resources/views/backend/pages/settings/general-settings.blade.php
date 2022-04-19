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
                    <form action="{{ route('admin.settings.index') }}" method="POST" enctype="multipart/form-data">
                        <div class="card-body ">
                            @csrf
                            <p class="mb-1">{{__('Site Name')}}: </p>
                            <div class="input-group input-group-lg mb-3">
                                <input type="text" name="site_name" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                       placeholder="{{__('Site Name')}}" value="{{ $generalSettings?$generalSettings->site_name:old('site_name') }}">
                                <br>
                                @if ($errors->has('site_name'))
                                    <span class="text-danger">{{ $errors->first('site_name') }}</span>
                                @endif
                            </div>

                            <p class="mb-1">{{__('Meta Keyword')}}: <code>{{__('Put comma(,) for separate the meta key')}}</code></p>
                            <div class="input-group input-group-lg mb-3">
                                <input type="text" name="meta_keyword" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                       placeholder="{{__('Meta Keyword')}}" data-role="tagsinput" value="{{ $generalSettings?$generalSettings->meta_keyword:old('meta_keyword') }}">
                                <br>
                                @if ($errors->has('meta_keyword'))
                                    <span class="text-danger">{{ $errors->first('meta_keyword') }}</span>
                                @endif
                            </div>

                            <p class="mb-1">{{__("Meta Description")}}: <code>{{__('maximum 50 word')}}</code></p>
                            <div class="input-group mb-3">
                            <textarea class="form-control" name="meta_description" aria-label="With textarea"
                                      rows="4">{{ $generalSettings?$generalSettings->meta_description:old('meta_description') }}</textarea>
                                <br>
                                @if ($errors->has('meta_description'))
                                    <span class="text-danger">{{ $errors->first('meta_description') }}</span>
                                @endif
                            </div>

                            <p class="mb-1">{{__('Location Map')}}: </p>
                            <div class="input-group input-group-lg mb-3">
                                <input type="text" name="location_map" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                       placeholder="{{__('Location Map')}}" value="{{ $generalSettings?$generalSettings->location_map:old('location_map') }}">
                                <br>
                                @if ($errors->has('location_map'))
                                    <span class="text-danger">{{ $errors->first('location_map') }}</span>
                                @endif
                            </div>

                            <p class="mb-1">{{__('Logo')}}: <code>{{__('expected size is 64x64px')}}</code></p>
                            <div class="form-row p-5">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="px-5">
                                            <div class="site-logo" id="site-logo">
                                                <div class="input-images"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6  d-md-block  d-sm-none">
                                    <div class="img-favicon">
                                        {!! $generalSettings?'<img src="'.asset($generalSettings->logo).'" alt="Og Meta Image" class="img-thumbnail">':'' !!}
                                    </div>

                                </div>
                            </div>

                            <p class="mb-1">{{__('Favicon')}}: <code>{{__('expected size is 32x32px')}}</code></p>
                            <div class="form-row p-5">
                                <div class="col-md-6  d-md-block  d-sm-none">
                                    <div class="img-favicon float-left">
                                        {!! $generalSettings?'<img src="'.asset($generalSettings->favicon).'" alt="Og Meta Image" class="img-thumbnail">':'' !!}
                                    </div>

                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="px-5">
                                            <div class="site-favicon" id="site-favicon">
                                                <div class="input-images"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <p class="mb-1">{{__('Site Tag Image')}}: <code>{{__('expected size is 64x64px')}}</code></p>
                            <div class="form-row p-5">
                                <div class="col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <div class="px-5">
                                            <div class="site_tag_image" id="site_tag_image">
                                                <div class="input-images"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6  d-md-block  d-sm-none">
                                    <div class="img-favicon">
                                        {!! $generalSettings?'<img src="'.asset($generalSettings->site_tag_image).'" alt="Og Meta Image" class="img-thumbnail">':'' !!}

                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="wizard-action text-left">
                                <button class="btn btn-wave-light btn-danger btn-lg" type="submit">{{__('Submit form')}}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('backend/assets/js/logo-page-scripts.js') }}"></script>
@endsection
