@extends('frontend.layouts.master-layout')

@section('title', config('app.name', 'laravel'). ' | '.$title)

@section('page-css')

@endsection

@section('content')
    <section class="container page-wrap">
        <div class="row">
            <section class="col-lg-8 col-md-8 col-sm-12 page-content">
                @if(isset($data->image))
                    <img src="{{ asset($data->image) }}" alt="" class="img-fluid img-thumbnail">
                @endif

                <h4 class="mt-5">{{ $data->title }}</h4>
                <p class="mb-4"><i class="fa fa-calendar" aria-hidden="true"></i> <small>{{ date('F d,Y',strtotime($data->created_at)) }}</small></p>
                {!! $data->description !!}
            </section>

            @include('frontend.pages.widgets.page-right')
        </div>
    </section>

    <section class="container p-5">
        <span class="m-5">
            @if($dataPrevious)
                <a href="{{ route($dataItem,$dataPrevious->id) }}"><i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i> {{ $dataPrevious->title }}</a>
            @endif
        </span>

        <span class="m-5">
            @if($dataNext)
                <a href="{{ route($dataItem,$dataNext->id) }}">{{ $dataNext->title }} <i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i></a>
            @endif
        </span>
    </section>
@endsection

@section('page-script')

@endsection

