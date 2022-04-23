@extends('frontend.layouts.master-layout')

@section('title', config('app.name', 'laravel'). ' | '.$title)

@section('page-css')

@endsection

@section('content')
    <section class="container homeBanner">
        <img class="my-5" src="{{ asset('upload/settings/Mujib-100-Banner__Final-1.jpg') }}" alt="">
    </section>

    <section class="container homeContents">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12 bg-danger">
                hi
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 bg-success">
                hi
            </div>
        </div>
    </section>
@endsection

@section('page-script')

    <script src="{{asset('frontend/js/video-carousel.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.touchSwipe.min.js')}}"></script>

@endsection

