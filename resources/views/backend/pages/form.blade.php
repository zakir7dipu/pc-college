@extends('backend.layouts.master-layout')

@section('title', config('app.name', 'laravel'). ' | '.$title)

@section('page-css')
    <style>
        .imageHolder {
            height: 11.5rem;
        }
        .imageHolder img {
            width: 100%;
            height: 100%;
        }
    </style>
@endsection

@section('content')
    <!-- WRAPPER CONTENT ----------------------------------------------------------------------------->
    <div id="wrapper-content">

        <div class="container-fluid">

            <div class="row">
                <div class="col">
                    <nav class="breadcrumb justify-content-sm-start justify-content-center text-center text-light bg-dark ">
                        <a class="breadcrumb-item text-white" href="{{  route('admin.dashboard') }}">{{ __('Home') }}</a>
                        <span class="breadcrumb-item active">{{ __($title) }}</span>
                        <span class="breadcrumb-info" id="time"></span>
                    </nav>
                </div>
            </div>


            <div class="row">
                <div class="col-12 card bg-dark text-white">
                    <div class="card-header">
                        <h6>{{ __($title) }}</h6>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ $value?route('admin.'.$pageItem.'.update',$value->id):route('admin.'.$pageItem.'.store') }}" enctype="multipart/form-data">
                            @csrf
                            @if($value)
                                @method("put")
                            @endif
                            <div class="form-row">
                                <div class="col-lg-8 col--md-8 col-sm-12">
                                    <div class="form-group">
                                        <label for="title">Title <i class="text-danger fas fa-star-of-life"></i></label>
                                        <input type="text" name="title" id="title" class="form-control rounded" value="{{ $value?$value->title:'' }}" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Description <i class="text-danger fas fa-star-of-life"></i></label>
                                        <textarea name="description" id="description" class="form-control">{!! $value?$value->description:'' !!}</textarea>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    <div class="form-group text-center">
                                        <button class="btn btn-lg w-50 btn-danger rounded">Save</button>
                                    </div>
                                    @if($pageItem != "media-coverage")
                                    <div class="form-group imageHolder">
                                        {!! $value?'<img src="'.asset($value->image).'" alt="Image">':'' !!}
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Image <p><code class="text-capitalize">accepted image size will be then Dash
                                                    accepted image size will be then Dash</code></p></label>
                                        <div class="input-image" id="input_image">
                                            <div class="input-images"></div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @if($pageItem == "event")
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <label for="buttonText">Button Text</label>
                                        <input class="form-control" type="text" name="button_text" id="buttonText" required value="{{ $value?$value->button_text:'' }}" placeholder="Button Text"/>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <label for="buttonUrl">Button Url</label>
                                        <input class="form-control" type="text" name="button_url" id="buttonUrl" required value="{{ $value?$value->button_url:'' }}" placeholder="Button Url"/>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <label for="startAt">Start Date</label>
                                        <input class="form-control" type="datetime-local" name="start_at" id="startAt" required value="{{ $value?strtotime($value->start_at):'' }}"/>
                                    </div>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER CONTENT ------------------------------------------------------------------------->
@endsection

@section('page-script')
    <script src="{{ asset("backend/assets/js/form-summerNote.js") }}"></script>
    <script>
        (function ($){
            "use script";
            $('.input-image').imageUploader({
                imagesInputName: 'photo',
                maxFiles: 1,
            });
        })(jQuery)
    </script>
@endsection
