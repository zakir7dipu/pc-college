@extends('backend.layouts.master-layout')

@section('title', config('app.name', 'laravel'). ' | '.$title)

@section('page-css')
    <style>
        tr td img {
            width: 10rem!important;
            height: 7rem!important;
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
                    <div class="card-header ">
                        <div class="col-12 text-right">
                            <a href="{{ route('admin.recreation.create') }}">
                                <button type="button" class="btn btn-sm btn-danger rounded"><i class="fas fa-plus" title="Add New Event"></i></button>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr class="text-center">
                                <th width="5%">SL</th>
                                <th width="20%">Thumb</th>
                                <th width="60%">Title</th>
                                <th width="15%">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($recreationEvents as $key => $recreationEvent)
                                <tr>
                                    <th>{{ $key+1 }}</th>
                                    <td>
                                        <img src="{{ asset($recreationEvent->image) }}" alt="" class="img-fluid img-thumbnail rounded">
                                    </td>
                                    <td>{{ $recreationEvent->title }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.recreation.edit', $recreationEvent->id) }}">
                                            <button type="button" class="btn btn-sm btn-success rounded">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                        </a>
                                        <button type="button" class="btn btn-sm btn-danger rounded">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
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
    <!-- END WRAPPER CONTENT ------------------------------------------------------------------------->
@endsection

@section('page-script')

@endsection
