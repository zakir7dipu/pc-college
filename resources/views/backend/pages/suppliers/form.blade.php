@extends('backend.layouts.master-layout')

@section('title', config('app.name', 'laravel').' | '.$title)

@section('page-css')

@endsection

@section('content')
    <div id="wrapper-content">
        <div class="row">
            <div class="col">
                <nav class="breadcrumb justify-content-sm-start justify-content-center text-center text-light bg-dark ">
                    <a class="breadcrumb-item text-white" href="{{ route('admin.dashboard') }}">{{__('Home')}}</a>
                    <a class="breadcrumb-item text-white" href="{{ route('admin.supplier.index') }}">{{__('Supplier')}}</a>
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
                    <form action="{{ $supplier? route('admin.supplier.update',$supplier->id) : route('admin.supplier.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($supplier)
                            @method('PATCH')
                        @endif
                        <div class="card-body ">
                           <div class="form-row">
                               <div class="col-md-8">
                                   <p class="mb-1 font-weight-bold">{{__('Company Name :')}}</p>
                                   <div class="input-group input-group-lg mb-3">
                                       <input type="text" name="company_name" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                              placeholder="{{__('Company Name')}}" value="{{ $supplier?$supplier->company_name:old('company_name') }}">
                                       <br>
                                       @if ($errors->has('company_name'))
                                           <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                       @endif
                                   </div>

                                   <p class="mb-1 font-weight-bold">{{__('Company Email :')}}</p>
                                   <div class="input-group input-group-lg mb-3">
                                       <input type="email" name="email" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                              placeholder="{{__('Company email')}}" value="{{ $supplier?$supplier->email:old('email') }}">
                                       <br>
                                       @if ($errors->has('email'))
                                           <span class="text-danger">{{ $errors->first('email') }}</span>
                                       @endif
                                   </div>

                                   <p class="mb-1 font-weight-bold">{{__('Company Phone :')}}</p>
                                   <div class="input-group input-group-lg mb-3">
                                       <input type="tel" name="phone" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                              placeholder="{{__('Company phone')}}" value="{{ $supplier?$supplier->phone:old('phone') }}">
                                       <br>
                                       @if ($errors->has('phone'))
                                           <span class="text-danger">{{ $errors->first('phone') }}</span>
                                       @endif
                                   </div>

                                   <p class="mb-1 font-weight-bold">{{__('URL :')}} </p>
                                   <div class="input-group input-group-lg mb-3">
                                       <input type="text" name="url" class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                              placeholder="{{__('Company url')}}" value="{{ $supplier?$supplier->url:old('url') }}">
                                       <br>
                                       @if ($errors->has('url'))
                                           <span class="text-danger">{{ $errors->first('url') }}</span>
                                       @endif
                                   </div>
                                   <table class="table table-responsive-sm">
                                       <label for="programStatus">
                                           <span class="font-weight-bold">{{__('Publish Status')}}</span>
                                       </label>
                                       <tbody>
                                       <tr>
                                           <td>
                                               <label class="switch float-left">
                                                   <input type="checkbox" name="status" {{ $supplier?($supplier->status==true?'checked':''):'' }} id="programStatus">
                                                   <span class="slider round"></span>
                                               </label>
                                           </td>
                                       </tr>
                                       </tbody>
                                   </table>
                               </div>

                               <div class="col-md-4">
                                   <div class="pl-3 pr-2">
                                       <p class="mb-2 font-weight-bold">{{__('Image :')}} <code>{{__('Acceptable image size 160 x 60
                                           pixel')}}</code></p>
                                       <div class="mb-3">
                                           <div class="supplier_bg_image" id="supplier_bg_image">
                                               <div class="input-images"></div>
                                           </div>
                                       </div>
                                   </div>

                                   @if($supplier)
                                   <div class="pl-3 pr-2 ">
                                       <p class="mb-2 font-weight-bold ">{{__('Old Image :')}} </p>
                                       <img src="{{ asset($supplier->logo) }}" alt="" width="100" class="img-fluid img-thumbnail bg-secondary">
                                   </div>
                                   @endif

                               </div>
                           </div>


                        </div>
                        <div class="card-footer">
                            <div class="wizard-action text-left">
                                <button class="btn btn-wave-light btn-danger btn-lg" type="submit">{{__('Submit form')}}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('backend/assets/js/suppliers-page.js') }}"></script>
@endsection
