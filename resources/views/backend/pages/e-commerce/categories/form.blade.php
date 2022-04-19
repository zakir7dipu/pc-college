@extends('backend.layouts.master-layout')

@section('title', config('app.name', 'laravel').' | '.$title)

@section('page-css')

@endsection

@section('content')
    <div id="wrapper-content">
        <div class="row">
            <div class="col">
                <nav class="breadcrumb justify-content-sm-start justify-content-center text-center text-light bg-dark ">
                    <a class="breadcrumb-item text-white"
                       href="{{ route('admin.dashboard') }}">{{__('Home')}}</a>
                    <a class="breadcrumb-item text-white" href="{{ route('admin.e-commerce.category.index') }}">{{__('View Categories')}}</a>
                    <span class="breadcrumb-item active">{{__($title)}}</span>
                    <span class="breadcrumb-info" id="time"></span>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card card-dark bg-dark">
                    <div class="card-header">
                        <div class="col-12 pl-0">
                            <h6 class="card-title ">{{__($title)}}</h6>
                        </div>
                    </div>
                    <form class="" action="{{ $selectedItem?route('admin.e-commerce.category.update', $selectedItem->id):route('admin.e-commerce.category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($selectedItem)
                            @method('put')
                        @endif

                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-7">
                                    <p class="mb-1"><label for="category" class="card-title font-weight-bold">{!! __('Category').' <small>('.__('Optional').')</small> &nbsp; <code>'.__('If you want to add sub-category please select this option').'</code>' !!}</label> </p>
                                    <div class="input-group input-group-lg mb-3">
                                        <select name="category" id="category" class="form-control" {{ $categories->count() == 0?'readonly':'' }}>
                                            <option value="{{ null }}">{{ __('Select One') }}</option>
                                            @foreach($categories as $category)
                                                <option {{ $selectedItem?($selectedItem->category?($selectedItem->category->id == $category->id ? 'selected':''):''):''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        @if ($errors->has('category'))
                                            <span class="text-danger">{{ $errors->first('category') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-12 pl-5" id="showSubcategory">
                                        <p class="mb-1"><label for="subCategory" class="card-title font-weight-bold">{!! __('Sub-Category').' <small>('.__('Optional').')</small> &nbsp; <code>'.__('If you want to add Pro-category please select this option').'</code>' !!}</label> </p>
                                        <div class="input-group input-group-lg mb-3">
                                            <select name="sub_category" id="subCategory" class="form-control" {{ $categories->count() == 0?'readonly':'' }} data-role="{{ $selectedItem?
                    ($selectedItem->sub_category
                        ?$selectedItem->sub_category->id
                        :null)
                    :null }}">
                                                <option value="{{ null }}">{{ __('Select One') }}</option>
                                            </select>
                                            <br>
                                            @if ($errors->has('sub_category'))
                                                <span class="text-danger">{{ $errors->first('sub_category') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <p class="mb-1"><label for="name" class="card-title font-weight-bold">{{__('Name:')}}</label> </p>
                                    <div class="input-group input-group-lg mb-3">
                                        <input type="text" name="name" id="name"  class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                               placeholder="{{__('Name')}}" value="{{  $selectedItem?$selectedItem->name:old('name') }}">
                                        <br>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                    <table class="table table-responsive-sm">
                                        <label for="categoryStatus">
                                            <span class="font-weight-bold">{{__('Publish Status')}}</span>
                                        </label>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label class="switch float-left">
                                                    <input {{ $selectedItem?($selectedItem->status?'checked':''):'checked' }} type="checkbox" name="status" id="categoryStatus">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col-md-5">
                                    <p class="h6 mb-1 text-uppercase">{!! __('Icon').' &nbsp;<code>'.__('only PNG files are supported here, and file size will be 64 pixel x 64 pixel').'</code>' !!}</p>
                                    <div class="mb-3">
                                        <div class="category-icon" id="categoryIcon">
                                            <div class="input-images"></div>
                                        </div>
                                    </div>

                                    <div class="mb-1">
                                        @if($selectedItem)
                                            @if($selectedItem->icon)
                                                <img src="{{ asset($selectedItem->icon) }}" alt="category icon" class="img-fluid w-25 img-thumbnail rounded">
                                            @endif
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-wave-light btn-danger btn-lg" type="submit">{{__('Submit form')}}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{asset('backend/assets/js/ecommerce/category.js')}}"></script>
@endsection
