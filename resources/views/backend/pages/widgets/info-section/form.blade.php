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
                        <h6 class="card-title lh-35">{{ __($title) }}</h6>
                    </div>
                    <div class="card-body">
                        @if($generalSettings)
                            <div class="form-row">
                                <div class="col-3 mx-auto">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <td class="text-right font-weight-bold">{{ __('Show') }}</td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="content-show activeInfoSection" name="info_section_show" {{ $generalSettings?($generalSettings->info_section_show?'checked':''):'checked' }}>
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                        <div class="form-row {{ $generalSettings?($generalSettings->info_section_show?'':'d-none'):'d-none' }}" id="infoSectionFormContainer">
                            @foreach($infoSection as $key => $column)
                                <div class="col-4">
                                    <form action="{{ route('admin.widget.info-section.store', $column->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <p class="mb-1 font-weight-bold"><label for="description">{{__('Column Icon :')}}</label> &nbsp;<sup><i class="text-danger fas fa-star-of-life small"></i></sup> &nbsp; <code>{{ __('Expected Image size will be 64px x 64px') }}</code></p>
                                            <div class="form-row">
                                                <div class="col-4" style="display: flex; justify-content: center; align-content: center;">
                                                    @if($column->icon)
                                                        <div class="input-group p-3" style="display: flex; justify-content: center; align-content: center;">
                                                            <div class="form-group w-100" style="display: flex; justify-content: center; align-content: center;">
                                                                <div class="px-2" style="display: flex; justify-content: center; align-content: center;">
                                                                    <img src="{{ asset($column->icon) }}" class="img-fluid img-thumbnail" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                                <div class="col-8">
                                                    <div class="input-group p-3">
                                                        <div class="form-group w-100">
                                                            <div class="px-2">
                                                                <div class="column_img" id="{{ 'columnImg'.$key }}">
                                                                    <div class="{{ 'input-images'.$key }}"></div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p class="mb-1 font-weight-bold"><label for="title">{{__('Column title :')}}</label> &nbsp;<sup><i class="text-danger fas fa-star-of-life small"></i></sup></p>
                                            <div class="input-group input-group-lg mb-3">
                                                <input type="text" name="title" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                                       placeholder="{{__('Column Title')}}" value="{{ $column->title }}">
                                                <br>
                                                @if ($errors->has('title'))
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p class="mb-1 font-weight-bold"><label for="sub_title">{{__('Column Sub-Title :')}}</label> &nbsp;<sup><i class="text-danger fas fa-star-of-life small"></i></sup></p>
                                            <div class="input-group input-group-lg mb-3">
                                                <input type="text" name="sub_title" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                                       placeholder="{{__('Column Sub-Title')}}" value="{{ $column->sub_title }}">
                                                <br>
                                                @if ($errors->has('sub_title'))
                                                    <span class="text-danger">{{ $errors->first('sub_title') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p class="mb-1 font-weight-bold"><label for="description">{{__('Column Description :')}}</label> &nbsp;<sup><i class="text-danger fas fa-star-of-life small"></i></sup></p>
                                            <textarea name="description" class="form-control" rows="5" aria-label="Large"
                                                      placeholder="{{__('Column Description')}}">{!! $column->description !!}</textarea>
                                            <br>
                                            @if ($errors->has('description'))
                                                <span class="text-danger">{{ $errors->first('description') }}</span>
                                            @endif
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-danger btn-lg rounded w-50">{{ __('Save') }}</button>
                                        </div>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-script')
    <script src="{{ asset('backend/assets/js/widgets/info-section-settings.js') }}"></script>
@endsection
