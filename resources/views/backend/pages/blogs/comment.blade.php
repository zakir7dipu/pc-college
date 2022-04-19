@extends('backend.layouts.master-layout')

@section('title', $title)

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

        <!-- Contact Info -->
        <div class="row">
            <div class="col-12">
                <div class="card card-light bg-white text-light rounded">
                    <div class="card-header bg-dark expand-btn">
                        <span class="card-title font-weight-bold">{{ __($title) }}</span>
                    </div>
                    <form action="{{ route('admin.blog.comment-settings') }}" method="post" class="">
                        @csrf
                        <div class="card-body text-black">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="contact-title" class="card-title">{{ __('Comment Code') }}: <code>{{__('Code
                                            to use after the opening body tag')}}</code></label>
                                        <textarea  name="code" id="column4_description" class="form-control" rows="8">{!! $commentSetting?$commentSetting->code:old('code') !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-danger btn-lg rounded">{{ __('Save') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')

@endsection
