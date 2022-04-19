@extends('backend.layouts.master-layout')

@section('title', config('app.name', 'laravel'). ' | '.$title)

@section('page-css')

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

            <div class="row mb-3">
                <div class="card card-dark bg-dark col-12">
                    <div class="card-header">
                        <div class="card-title">{{ __('Company Overview') }}</div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="section" value="overview">
                            <p class="mb-1"><label for="title" class="card-title font-weight-bold">{{__('Section Title:')}}</label> <sup><i class="fas fa-star-of-life text-danger"></i></sup></p>
                            <div class="input-group input-group-lg mb-3">
                                <input type="text" name="title" id="title"  class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                       placeholder="{{__('Section Title')}}" value="{{  $page->sections()->where('name','overview')->first()?$page->sections()->where('name','overview')->first()->title:old('title') }}">
                                <br>
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>

                            <p class="mb-1"><label for="content" class="card-title font-weight-bold">{{__('Section Content:')}}</label> <sup><i class="fas fa-star-of-life text-danger"></i></sup></p>
                            <div class="form-group mb-3">
                                <textarea name="content" id="content" rows="10"  class="form-control" placeholder="{{__('Write you section content')}}">{!! $page->sections()->where('name','overview')->first()?$page->sections()->where('name','overview')->first()->content:old('content') !!}</textarea>
                                <br>
                                @if ($errors->has('content'))
                                    <span class="text-danger">{{ $errors->first('content') }}</span>
                                @endif
                            </div>

                            <table class="table table-responsive-sm mb-0">
                                <thead>
                                <tr>
                                    <td>
                                        <label for="pageStatus">
                                            <span class="font-weight-bold">{{__('Publish Status')}}</span>
                                        </label>
                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <label class="switch float-left">
                                            <input {{ $page->sections()->where('name','overview')->first()?($page->sections()->where('name','overview')->first()->status?'checked':''):'checked' }}  type="checkbox" name="status" id="pageStatus">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-danger btn-lg w-50">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="card card-dark bg-dark col-12">
                    <div class="card-header">
                        <div class="card-title">{{ __('about image') }}</div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="section" value="about_img">
                            <input type="hidden" name="title" value="about page img">
                            <input type="hidden" name="content" value="about page img">
                            <div class="form-row">
                                <div class="form-group col-6">
                                    @if($page->sections()->where('name','about_img')->first())
                                        <img src="{{ asset($page->sections()->where('name','about_img')->first()->content) }}" alt="page image" class="img-fluid w-50 img-thumbnail rounded">
                                    @endif
                                </div>
                                <div class="form-group col-6">
                                    <p class="mb-1"><label for="title" class="card-title font-weight-bold">{{__('Image:')}}</label> <sup><i class="fas fa-star-of-life text-danger"></i></sup> <code>{{ __('Expected image will be 685 x 532 pixel
') }}</code></p>
                                    <div class="mb-3">
                                        <div class="about-images" id="aboutImages">
                                            <div class="input-images"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <table class="table table-responsive-sm mb-0">
                                <thead>
                                <tr>
                                    <td>
                                        <label for="pageStatus">
                                            <span class="font-weight-bold">{{__('Publish Status')}}</span>
                                        </label>
                                    </td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        <label class="switch float-left">
                                            <input {{ $page->sections()->where('name','about_img')->first()?($page->sections()->where('name','about_img')->first()->status?'checked':''):'checked' }}  type="checkbox" name="status" id="pageStatus">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-danger btn-lg w-50">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="card card-dark bg-dark col-12">
                    <div class="card-header">
                        <div class="card-title">{{ __('Mission & Vision') }}</div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-6">
                                    <input type="hidden" name="section" value="mission">
                                    <p class="mb-1"><label for="missionTitle" class="card-title font-weight-bold">{{__('Section Title:')}}</label> <sup><i class="fas fa-star-of-life text-danger"></i></sup></p>
                                    <div class="input-group input-group-lg mb-3">
                                        <input type="text" name="title" id="missionTitle"  class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                               placeholder="{{__('Section Title')}}" value="{{  $page->sections()->where('name','mission')->first()?$page->sections()->where('name','mission')->first()->title:old('content') }}">
                                        <br>
                                        @if ($errors->has('title'))
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        @endif
                                    </div>

                                    <p class="mb-1"><label for="missionContent" class="card-title font-weight-bold">{{__('Section Content:')}}</label> <sup><i class="fas fa-star-of-life text-danger"></i></sup></p>
                                    <div class="form-group mb-3">
                                        <textarea name="content" id="missionContent" rows="10"  class="form-control" placeholder="{{__('Write you section content')}}">{!! $page->sections()->where('name','mission')->first()?$page->sections()->where('name','mission')->first()->content:old('content') !!}</textarea>
                                        <br>
                                        @if ($errors->has('content'))
                                            <span class="text-danger">{{ $errors->first('content') }}</span>
                                        @endif
                                    </div>

                                    <table class="table table-responsive-sm mb-0">
                                        <thead>
                                        <tr>
                                            <td>
                                                <label for="missionStatus">
                                                    <span class="font-weight-bold">{{__('Publish Status')}}</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label class="switch float-left">
                                                    <input {{ $page->sections()->where('name','mission')->first()?($page->sections()->where('name','mission')->first()->status?'checked':''):'checked' }}  type="checkbox" name="status" id="missionStatus">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group col-6">
                                    <input type="hidden" name="section_vision" value="vision">
                                    <p class="mb-1"><label for="visionTitle" class="card-title font-weight-bold">{{__('Section Title:')}}</label> <sup><i class="fas fa-star-of-life text-danger"></i></sup></p>
                                    <div class="input-group input-group-lg mb-3">
                                        <input type="text" name="vision_title" id="visionTitle"  class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                               placeholder="{{__('Section Title')}}" value="{{  $page->sections()->where('name','vision')->first()?$page->sections()->where('name','vision')->first()->title:'' }}">
                                        <br>
                                        @if ($errors->has('vision_title'))
                                            <span class="text-danger">{{ $errors->first('vision_title') }}</span>
                                        @endif
                                    </div>

                                    <p class="mb-1"><label for="visionContent" class="card-title font-weight-bold">{{__('Section Content:')}}</label> <sup><i class="fas fa-star-of-life text-danger"></i></sup></p>
                                    <div class="form-group mb-3">
                                        <textarea name="vision_content" id="visionContent" rows="10"  class="form-control" placeholder="{{__('Write you section content')}}">{!! $page->sections()->where('name','vision')->first()?$page->sections()->where('name','vision')->first()->content:'' !!}</textarea>
                                        <br>
                                        @if ($errors->has('vision_content'))
                                            <span class="text-danger">{{ $errors->first('vision_content') }}</span>
                                        @endif
                                    </div>

                                    <table class="table table-responsive-sm mb-0">
                                        <thead>
                                        <tr>
                                            <td>
                                                <label for="visionStatus">
                                                    <span class="font-weight-bold">{{__('Publish Status')}}</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label class="switch float-left">
                                                    <input {{ $page->sections()->where('name','vision')->first()?($page->sections()->where('title','vision')->first()->status?'checked':''):'checked' }}  type="checkbox" name="vision_status" id="visionStatus">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-danger btn-lg w-50">{{ __('Save') }}</button>
                                </div>
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
    <script src="{{ asset('backend/assets/js/form-summerNote.js') }}"></script>
    <script src="{{ asset('backend/assets/js/widgets/page-settings.js') }}"></script>
@endsection
