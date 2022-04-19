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
                        <div class="card-title">{{ __('Contact map') }}</div>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="section" value="map">
                            <p class="mb-1"><label for="title" class="card-title font-weight-bold">{{__('Section Title:')}}</label> <sup><i class="fas fa-star-of-life text-danger"></i></sup></p>
                            <div class="input-group input-group-lg mb-3">
                                <input type="text" name="title" id="title"  class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                       placeholder="{{__('Section Title')}}" value="{{  $page->sections()->where('name','map')->first()?$page->sections()->where('name','map')->first()->title:old('title') }}">
                                <br>
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                            </div>

                            <p class="mb-1"><label for="content" class="card-title font-weight-bold">{{__('Map Share Link:')}}</label> <sup><i class="fas fa-star-of-life text-danger"></i></sup></p>
                            <div class="form-group mb-3">
                                <textarea name="content" id="content" rows="3"  class="form-control" placeholder="{{__('Write your map sharing link')}}">{!! $page->sections()->where('name','map')->first()?$page->sections()->where('name','map')->first()->content:old('content') !!}</textarea>
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
                                            <input {{ $page->sections()->where('name','map')->first()?($page->sections()->where('name','map')->first()->status?'checked':''):'checked' }}  type="checkbox" name="status" id="pageStatus">
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
                        <div class="card-title">{{ __('Contact Info') }}</div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.settings.company-contact') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6">
                                    <p class="mb-1"><label for="phone" class="card-title font-weight-bold">{{__('Contact Phone:')}}</label> <sup><i class="fas fa-star-of-life text-danger"></i></sup></p>
                                    <div class="input-group input-group-lg mb-3">
                                        <input type="text" name="phone" id="phone"  class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                               placeholder="{{__('Company customer care number')}}" value="{{  $companyContact?$companyContact->phone:old('phone') }}">
                                        <br>
                                        @if ($errors->has('phone'))
                                            <span class="text-danger">{{ $errors->first('phone') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-1"><label for="email" class="card-title font-weight-bold">{{__('Contact Mail:')}}</label> <sup><i class="fas fa-star-of-life text-danger"></i></sup></p>
                                    <div class="input-group input-group-lg mb-3">
                                        <input type="text" name="email" id="email"  class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                               placeholder="{{__('Company customer care email')}}" value="{{  $companyContact?$companyContact->email:old('email') }}">
                                        <br>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <p class="mb-1"><label for="address" class="card-title font-weight-bold">{{__('Contact Address:')}}</label> <sup><i class="fas fa-star-of-life text-danger"></i></sup></p>
                                    <div class="input-group input-group-lg mb-3">
                                        <input type="text" name="address" id="address"  class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                               placeholder="{{__('Company customer care address')}}" value="{{  $companyContact?$companyContact->address:old('address') }}">
                                        <br>
                                        @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-danger btn-lg w-50">{{ __('Save') }}</button>
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
    <script src="{{ asset('backend/assets/js/widgets/page-settings.js') }}"></script>
@endsection
