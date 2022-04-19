@extends('backend.layouts.master-layout')

@section('title', $title)

@section('page-css')

@endsection

@section('content')

<div id="wrapper-content">
    <div class="row">
        <div class="col">
            <nav class="breadcrumb justify-content-sm-start justify-content-center text-center text-light bg-dark ">
                <a class="breadcrumb-item text-white" href="{{route('admin.dashboard')}}">{{__('Home')}}</a>
                <span class="breadcrumb-item active">{{ __($title) }}</span>
                <span class="breadcrumb-info" id="time"></span>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-dark bg-dark">

                <div class="card-header d-block">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <h6 class="card-title lh-35">{{ __($title) }}</h6>
                        </div>
                        <div class="col-md-6 col-sm-12 text-right">
                                <a href="{{ route('admin.widget.slider.create') }}" class="btn btn-danger btn-sm rounded"><i class="material-icons">add</i></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive style-scroll">
                        <table id="slider" class="table dac_table table-striped table-bordered miw-500" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th width="5%">{{__('SL')}}</th>
                                <th>{{__('Image')}}</th>
                                <th>{{__('Name')}}</th>
                                <th>{{__('status')}}</th>
                                <th width="10%">{{__('Options')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($sliders as $key => $slider)
                                <tr>
                                    <th width="5%">{{ $key+1 }}</th>
                                    <td width="20%"><img src="{{ asset($slider->image) }}" alt="{{ $slider->name }}" class="img-fluid img-thumbnail"></td>
                                    <td width="50%">{{ $slider->name }}</td>
                                    <td width="10%">
                                        <label class="switch">
                                            <input type="checkbox" {{ $slider->status?'checked':'' }} datasrc="{{ $slider->id }}" class="sliderActivationBtn">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td width="20%">
                                        <div class="d-flex">
                                            <a href="{{ route('admin.widget.slider.edit',$slider->id) }}">
                                                <button type="button" class="btn btn-sm btn btn-success m-1 blogCategoryEditBtn" data-id="{{ $slider->id }}">{{ __('Edit') }}</button>
                                            </a>
                                            <a href="javascript:void(0)" title="{{__('Delete')}}" class="deleteSliderBtn">
                                                <button type="button" class="btn btn-sm btn btn-danger m-1">{{__('Delete')}}</button>
                                                <form action="{{ route('admin.widget.slider.destroy', $slider->id) }}" method="post" class="deleteForm">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden" name="_method" value="delete">
                                                </form>
                                            </a>


                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('page-script')
    <script src="{{ asset('backend/assets/js/widgets/slider-settings.js') }}"></script>
@endsection
