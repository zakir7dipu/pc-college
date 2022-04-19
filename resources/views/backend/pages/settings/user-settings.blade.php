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
                                <a href="javascript:void(0)" class="btn btn-danger btn-sm rounded adminUserAddBtn"><i class="material-icons">add</i></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive style-scroll">
                            <table id="slider" class="table dac_table table-striped table-bordered miw-500" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th width="5%">{{__('SL')}}</th>
                                    <th>{{__('Avatar')}}</th>
                                    <th>{{__('Name')}}</th>
                                    <th>{{__('Phone')}}</th>
                                    <th>{{__('Email')}}</th>
                                    <th width="10%">{{__('Action')}}</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($adminUsers as $key => $admin)
                                    <tr>
                                        <th>{{ $key+1 }}</th>
                                        <td>

                                            <img src="{{ $admin->profile_photo_url }}" alt="{{ $admin->name }}" class="img-fluid img-thumbnail sidebar-profile-img rounded-circle" />
                                        </td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->profile?$admin->profile->phone:'' }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="javascript:void (0)" title="{{__('Delete')}}" class="userDestroyBtn">
                                                    <button type="button" class="btn btn-sm btn btn-danger m-1">{{__('Delete')}}</button>
                                                    <form action="{{ route('admin.settings.user.destroy', $admin->id) }}" method="post" class="deleteForm">
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

    <!-- Modal -->
    <div class="modal fade" id="userModalCenter" tabindex="-1" role="dialog" aria-labelledby="userModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalCenterTitle">{{ __('Create New Admin') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.settings.user.store') }}" method="post">
                    <div class="modal-body">
                        @csrf
                        <p class="mb-1 font-weight-bold">{{__('Name :')}}</p>
                        <div class="input-group input-group-lg mb-3">
                            <input type="text" name="name" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                   placeholder="{{__('Name')}}">
                            <br>
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>

                        <p class="mb-1 font-weight-bold">{{__('Email :')}}</p>
                        <div class="input-group input-group-lg mb-3">
                            <input type="email" name="email" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                   placeholder="{{__('Email')}}">
                            <br>
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>

                        <p class="mb-1 font-weight-bold">{{__('Password :')}}</p>
                        <div class="input-group input-group-lg mb-3">
                            <input type="password" name="password" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                   placeholder="{{__('Password')}}">
                            <br>
                            @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </div>

                        <p class="mb-1 font-weight-bold">{{__('Password Confirmation :')}}</p>
                        <div class="input-group input-group-lg mb-3">
                            <input type="password" name="password_confirmation" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                   placeholder="{{__('Password Confirmation')}}">
                            <br>
                            @if ($errors->has('password_confirmation'))
                                <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary rounded" data-dismiss="modal">{{ __('Close') }}</button>
                        <button type="submit" class="btn btn-danger rounded">{{ __('Save') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@section('page-script')
    <script src="{{ asset('backend/assets/js/admin-user.js') }}"></script>
@endsection
