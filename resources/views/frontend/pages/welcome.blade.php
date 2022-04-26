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
            @include('frontend.pages.widgets.home-page-left')
            @include('frontend.pages.widgets.page-right')
        </div>
    </section>
@endsection

@section('page-script')

@endsection

