@extends('frontend.layouts.master-layout')

@section('title', config('app.name', 'laravel'). ' | '.$title)

@section('page-css')
    <style>
        #more {display: none;}
        .statementText{
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
    </style>
@endsection

@section('content')
    <section class="container homeBanner">
        <img class="my-5" src="{{ asset('upload/settings/WhatsApp Image 2022-12-29 at 12.jpg') }}" alt="">
    </section>

    <section class="container homeContents">
        <div class="row">
            @include('frontend.pages.widgets.home-page-left')
            @include('frontend.pages.widgets.page-right')
        </div>
    </section>
@endsection

@section('page-script')
    <script>
        function myFunction() {
            var dots = document.getElementById("dots");
            var moreText = document.getElementById("more");
            var btnText = document.getElementById("myBtn");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more";
                moreText.style.display = "none";
            } else {
                dots.style.display = "none";
                btnText.innerHTML = "Read less";
                moreText.style.display = "inline";
            }
        }
    </script>
@endsection

