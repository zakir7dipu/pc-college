@extends('backend.layouts.master-layout')

@section('title', config('app.name', 'laravel').' | '.$title)

@section('page-css')
    <link rel="stylesheet" href="{{ asset('backend/assets/plugin/Menu-Settings/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/plugin/Menu-Settings/css/bootstrap-iconpicker.min.css') }}" />
@endsection

@section('content')
    <div id="wrapper-content">
        <div class="row">
            <div class="col">
                <nav class="breadcrumb justify-content-sm-start justify-content-center text-center text-light bg-dark ">
                    <a class="breadcrumb-item text-white" href="{{ route('admin.dashboard') }}">{{__('Home')}}</a>
                    <span class="breadcrumb-item active">{{ $title }}</span>
                    <span class="breadcrumb-info" id="time"></span>
                </nav>
            </div>
        </div>

        <div class="row">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header d-block"><h5 class="float-left">Menu</h5>
                            </div>
                            <div class="card-body">
                                <ul id="myEditor" class="sortableLists list-group">
                                </ul>
                            </div>
                            <div class="card-footer d-block">
                                Submit to save
                                <div class="float-right">
                                    <button id="btnOutput" type="button" class="btn btn-success"><i class="fas fa-check-square"></i>submit</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card border-primary mb-3">
                            <div class="card-header bg-primary text-white">Edit item</div>
                            <div class="card-body">
                                <form id="frmEdit" class="form-horizontal">
                                    <div class="form-group">
                                        <label for="text">Text</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control item-menu" name="text" id="text" placeholder="Text">
                                            <div class="input-group-append">
                                                <button type="button" id="myEditor_icon" class="btn btn-outline-secondary"></button>
                                            </div>
                                        </div>
                                        <input type="hidden" name="icon" class="item-menu">
                                    </div>
                                    <div class="form-group">
                                        <label for="href">URL</label>
                                        <input type="text" class="form-control item-menu" id="href" name="href" placeholder="URL">
                                    </div>
                                    <div class="form-group">
                                        <label for="target">Target</label>
                                        <select name="target" id="target" class="form-control item-menu">
                                            <option value="_self">Self</option>
                                            <option value="_blank">Blank</option>
                                            <option value="_top">Top</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">Unicode</label>
                                        <input type="text" name="title" class="form-control item-menu" id="title" placeholder="Unicode">
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer">
                                <button type="button" id="btnUpdate" class="btn btn-primary" disabled><i class="fas fa-sync-alt"></i> Update</button>
                                <button type="button" id="btnAdd" class="btn btn-success"><i class="fas fa-plus"></i> Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('page-script')
    <script src="{{ asset('backend/assets/plugin/Menu-Settings/js/jquery-menu-editor.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugin/Menu-Settings/js/fontawesome5-3-1.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugin/Menu-Settings/js/bootstrap-iconpicker.min.js') }}"></script>
    <script src="{{ asset('backend/assets/plugin/Menu-Settings/js/main.js') }}"></script>
{{--    @include('backend.pages.settings.menu-settings.internal-assets.js.menu-item-js')--}}
@endsection
