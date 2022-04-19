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
                    <a class="breadcrumb-item text-white" href="{{route('admin.widget.slider.index')}}">{{__('Sliders')}}</a>
                    <span class="breadcrumb-item active">{{ __($title) }}</span>
                    <span class="breadcrumb-info" id="time"></span>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card card-dark bg-dark">
                    <div class="card-header d-block">
                        <h6 class="card-title lh-35">{{ __($title) }}</h6>
                    </div>

                    <form action="{{ $slider?route('admin.widget.slider.update',$slider->id):route('admin.widget.slider.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @if($slider)
                            @method('put')
                        @endif

                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-8">
                                    <p class="mb-1 font-weight-bold"><label for="name">{{__('Name :')}}</label> &nbsp;<sup><i class="text-danger fas fa-star-of-life small"></i></sup></p>
                                    <div class="input-group input-group-lg mb-3">
                                        <input type="text" name="name" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                               placeholder="{{__('Slider Name')}}" value="{{ $slider?$slider->name:old('name') }}">
                                        <br>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                    <p class="mb-1 font-weight-bold"><label for="line1">{{__('Line 1 :')}}</label></p>
                                    <div class="input-group input-group-lg mb-3">
                                        <input type="text" name="line1" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                               placeholder="{{__('Line 1')}}" value="{{ $slider?$slider->line1:old('line1') }}">
                                        <br>
                                        @if ($errors->has('line1'))
                                            <span class="text-danger">{{ $errors->first('line1') }}</span>
                                        @endif
                                    </div>

                                    <p class="mb-1 font-weight-bold"><label for="line2">{{__('Line 2 :')}}</label></p>
                                    <div class="input-group input-group-lg mb-3">
                                        <input type="text" name="line2" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                               placeholder="{{__('Line 2')}}" value="{{ $slider?$slider->line2:old('line2') }}">
                                        <br>
                                        @if ($errors->has('line2'))
                                            <span class="text-danger">{{ $errors->first('line2') }}</span>
                                        @endif
                                    </div>

                                    <p class="mb-1 font-weight-bold"><label for="line3">{{__('Line 3 :')}}</label></p>
                                    <div class="input-group input-group-lg mb-3">
                                        <input type="text" name="line3" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                               placeholder="{{__('Line 3')}}" value="{{ $slider?$slider->line3:old('line3') }}">
                                        <br>
                                        @if ($errors->has('line3'))
                                            <span class="text-danger">{{ $errors->first('line3') }}</span>
                                        @endif
                                    </div>

                                    <div class="form-row">
                                        <div class="col-6">
                                            <p class="mb-1 font-weight-bold"><label for="button_text">{{__('Button Text :')}}</label></p>
                                            <div class="input-group input-group-lg mb-3">
                                                <input type="text" name="button_text" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                                       placeholder="{{__('Button Text')}}" value="{{ $slider?$slider->btn_text:old('button_text') }}">
                                                <br>
                                                @if ($errors->has('button_text'))
                                                    <span class="text-danger">{{ $errors->first('button_text') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <p class="mb-1 font-weight-bold"><label for="button_url">{{__('Button Url :')}}</label></p>
                                            <div class="input-group input-group-lg mb-3">
                                                <input type="text" name="button_url" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                                       placeholder="{{__('Button Text')}}" value="{{ $slider?$slider->btn_url:old('button_url') }}">
                                                <br>
                                                @if ($errors->has('button_url'))
                                                    <span class="text-danger">{{ $errors->first('button_url') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <p class="mb-1"><label for="sliderImg">{{__('Slider Image')}}:</label> <sup><i class="text-danger fas fa-star-of-life small"></i></sup>&nbsp; <code>{{ __('Expected Image size will be 1583px x 540px') }}</code></p></p>
                                    <div class="input-group p-3">
                                        <div class="form-group w-100">
                                            <div class="px-2">
                                                <div class="slider_img" id="sliderImg">
                                                    <div class="input-images"></div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    @if($slider)
                                        <div class="input-group p-3">
                                            <div class="form-group w-100">
                                                <div class="px-2">
                                                    <img src="{{ asset($slider->image) }}" class="img-fluid img-thumbnail" alt="">
                                                </div>

                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-lg rounded">{{ __('Save') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-script')
    <script src="{{ asset('backend/assets/js/widgets/slider-settings.js') }}"></script>
@endsection
