@extends('backend.layouts.master-layout')

@section('title', config('app.name', 'laravel').' | '.$title)

@section('page-css')
    <link rel="stylesheet" href="{{asset('backend/assets/plugin/tag-input/tagsinput.css')}}" />
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

                    <form action="{{ $post?route('admin.blog.post.update',$post->id):route('admin.blog.post.store') }}" method="POST" enctype="multipart/form-data"
                          class="">
                        @csrf
                        @if($post)
                            @method('put')
                        @endif
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 col-sm-12 order-1">
                                    <div class="card-body bg-dark">
                                        <p class="mb-1 text-uppercase"><label for="postCategory">{{__('Category')}}</label>: <sup><i class="text-danger fas fa-star-of-life small"></i></sup> </p>
                                        <div class="input-group input-group-lg mb-3">
                                            <select name="category" id="postCategory" class="form-control">
                                                <option value="{{ null }}">{{ __('Select One Category') }}</option>

                                                @foreach($categories as $category)
                                                    <option {{ $post?($post->category->id == $category->id ? 'selected':''):'' }}  value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            <br>
                                            @if ($errors->has('category'))
                                                <span class="text-danger">{{ $errors->first('category') }}</span>
                                            @endif
                                        </div>

                                        <p class="mb-1 text-uppercase"><label for="pageTitle">{{__('Post Title')}}</label>: <sup><i class="text-danger fas fa-star-of-life small"></i></sup> </p>
                                        <div class="input-group input-group-lg mb-3">
                                            <input type="text" name="title" class="form-control" aria-label="Large"
                                                   aria-describedby="inputGroup-sizing-sm" id="pageName"
                                                   placeholder="{{__('Post title')}}" value="{{ $post?$post->title:old('title')}}" required>
                                            <br>
                                            @if ($errors->has('title'))
                                                <span class="text-danger">{{ $errors->first('title') }}</span>
                                            @endif
                                        </div>

                                        <p class="mb-1 text-uppercase"><label for="body">{{__('Content')}}</label>: <sup><i class="text-danger fas fa-star-of-life small"></i></sup> </p>
                                        <div class="input-group">
                                            <div class="form-group w-100">
                                                <textarea rows="8" name="body" id="body" class="form-control rounded">{!! $post?$post->body:old('body') !!}</textarea>
                                            </div>
                                        </div>



                                        <p class="mb-1 text-uppercase"><label for="pageTitle">{{__('Post tag')}}</label>:  </p>
                                        <div class="input-group input-group-lg">
                                            <input type="text" name="post_tags" class="form-control" data-role="tagsinput" aria-label="Large"
                                                   aria-describedby="inputGroup-sizing-sm" id="pageName"
                                                   placeholder="{{__('Post tags')}}" value="{{ $post?$post->tags:old('post_tags')}}" >
                                            <br>
                                            @if ($errors->has('post_tags'))
                                                <span class="text-danger">{{ $errors->first('post_tags') }}</span>
                                            @endif
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-4 col-sm-12 order-2">
                                    <div class="card-body bg-dark">

                                        <p class="mb-1 text-uppercase"><label for="postStatus">{{__('Publish status')}}</label>: </p>
                                        <div class="input-group input-group-lg mb-3 text-center">
                                            <select name="status" id="postStatus" class="form-control" required>
                                                <option value="{{ null }}">{{__('Select one')}}</option>
                                                <option {{ $post?($post->status?'selected':''):'' }} value="{{ true }}">{{__('Publish')}}</option>
                                                <option {{ $post?(!$post->status?'selected':''):'' }} value="{{ false }}">{{__('Un-publish')}}</option>
                                            </select>
                                        </div>

                                        <p class="mb-1">{{__('Post Image')}}: <sup><i class="text-danger fas fa-star-of-life small"></i></sup></p>
                                        <div class="input-group p-3">
                                            <div class="form-group w-100">
                                                <div class="px-2">
                                                    <div class="post_img" id="post_img">
                                                        <div class="input-images"></div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        @if($post)
                                            <div class="input-group p-3">
                                                <div class="form-group w-100">
                                                    <div class="px-2">
                                                        <img src="{{ asset($post->thumbnail) }}" class="img-fluid img-thumbnail" alt="">
                                                    </div>

                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="wizard-action card-body py-0 text-left">
                                <button class="btn btn-wave-light btn-danger btn-lg px-4" type="submit">{{__('Submit')}}</button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('backend/assets/js/blog/post.js') }}"></script>
    <script src="{{asset('backend/assets/plugin/tag-input/tagsinput.js')}}"></script>
    <script src="{{ asset('backend/assets/js/form-summerNote.js') }}"></script>
@endsection
