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
                    <span class="breadcrumb-item active text-capitalize">{{__($title)}}</span>
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
                                <h6 class="card-title">{{__($title)}}</h6>
                            </div>
                            <div class="col-md-6 col-sm-12 text-right">
                                <a href="{{ route('admin.blog.post.create') }}" class="btn btn-danger btn-sm rounded"> <i class="material-icons">add</i></a>
                            </div>
                        </div>

                    </div>
                    <div class="card-body ">
                        <div class="table-responsive style-scroll">

                            <table class="table table-striped table-bordered miw-500 dac_table" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th width="5%">{{__('SL No.')}}</th>
                                    <th>{{__('Author')}}</th>
                                    <th>{{__('Title')}}</th>
                                    <th>{{__('Thumbnail')}}</th>
                                    <th class="text-center">{{__('Status')}}</th>
                                    <th class="text-center">{{__('Option')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $key => $data)
                                    <tr>
                                        <th>{{ $loop->index+1 }}</th>
                                        <td>{{ $data->user->name }}</td>
                                        <td>{{ $data->title }}</td>
                                        <td>
                                            <img src="{{asset($data->thumbnail)}}" class="img-fluid img-thumbnail" width="100" alt="">
                                        </td>
                                        <td class="text-center">
                                            <label class="switch">
                                                <input type="checkbox" {{ $data->status?'checked':'' }} datasrc="{{ $data->id }}" class="postActivationBtn">
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.blog.post.edit',$data->id) }}" class="btn btn-info  btn-circle" >
                                                <i class="material-icons">edit</i>
                                            </a>
                                            <a href="javascript:void(0)" title="Delete"  class="btn btn-danger btn-circle deletePostBtn">
                                                <i class="material-icons">delete</i>
                                                <form action="{{ route('admin.blog.post.destroy',$data->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </a>

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
    <script src="{{asset('backend/assets/js/tables-datatable.js')}}"></script>
    <script src="{{ asset('backend/assets/js/blog/post.js') }}"></script>
@endsection
