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
                                <a href="{{ route('admin.supplier.create') }}" class="btn btn-danger btn-sm rounded"><i class="material-icons">add</i></a>
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
                                <th>{{__('Phone')}}</th>
                                <th>{{__('Email')}}</th>
                                <th>{{__('URL')}}</th>
                                <th>{{__('Status')}}</th>
                                <th width="10%">{{__('Action')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>
                                        <img src="{{ asset($supplier->logo) }}" alt="slider image" width="100" class="img-fluid img-thumbnail">
                                    </td>
                                    <td>{{$supplier->company_name}}</td>
                                    <td>{{$supplier->phone}}</td>
                                    <td>{{$supplier->email}}</td>

                                    <td>{{ $supplier->url }}</td>
                                    <td>
                                        <label class="switch">
                                            <input type="checkbox" {{ $supplier->status?'checked':'' }} datasrc="{{ $supplier->id }}" class="supplierActivationBtn">
                                            <span class="slider round"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{ route('admin.supplier.edit',$supplier->id) }}">
                                                <button type="button" class="btn btn-sm btn btn-success m-1 blogCategoryEditBtn" data-id="{{ $supplier->id }}">{{ __('Edit') }}</button>
                                            </a>
                                            <a href="javascript:void(0)" title="{{__('Delete')}}" class="sliderDestroyBtn">
                                                <button type="button" class="btn btn-sm btn btn-danger m-1">{{__('Delete')}}</button>
                                                <form action="{{ route('admin.supplier.destroy', $supplier->id) }}" method="post" class="deleteForm">
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
    <script src="{{ asset('backend/assets/js/suppliers-page.js') }}"></script>
@endsection
