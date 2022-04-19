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
                    <a class="breadcrumb-item text-white" href="{{ route('admin.e-commerce.product.index') }}">{{__('View All product')}}</a>
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
                    <form class="" action="{{ $product?route('admin.e-commerce.product.update', $product->id):route('admin.e-commerce.product.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($product)
                            @method('put')
                        @endif

                        <div class="card-body ">
                            <div class="row">
                                <div class="col-md-8">
                                    <p class="mb-1"><label for="subCategory" class="card-title font-weight-bold">{{ __('Sub-Category') }}</label> &nbsp;<sup><i class="fas fa-star-of-life text-danger"></i></sup> </p>
                                    <div class="input-group input-group-lg mb-3">
                                        <select name="sub_category" id="subCategory" class="form-control" {{ $categories->count() == 0?'readonly':'' }}>
                                            <option value="{{ null }}">{{ __('Select One') }}</option>

                                            @foreach($categories as $category)
                                                <optgroup label="{{ $category->name }}">
                                                    @foreach($category->childCategory()->orderBy('name', 'ASC')->get() as $child)
                                                        <option {{ $selectedItem?($selectedItem->sub_category?($selectedItem->sub_category->id == $child->id ? 'selected':''):''):''}} value="{{ $child->id }}">{{ $child->name }}</option>
                                                    @endforeach
                                                </optgroup>
                                            @endforeach
                                        </select>
                                        <br>
                                        @if ($errors->has('sub_category'))
                                            <span class="text-danger">{{ $errors->first('sub_category') }}</span>
                                        @endif
                                    </div>

                                    <div class="col-12" id="showProCategory">
                                        <p class="mb-1"><label for="proCategory" class="card-title font-weight-bold">{!! __('Pro-Category').' <small>('.__('Optional').')</small> &nbsp; <code>'.__('If you want to add product under any pro-category please select this option').'</code>' !!}</label> </p>
                                        <div class="input-group input-group-lg mb-3">
                                            <select name="pro_category" id="proCategory" class="form-control" {{ $categories->count() == 0?'readonly':'' }} data-role="{{ $selectedItem?($selectedItem->pro_category?$selectedItem->pro_category->id:null):null }}">
                                                <option value="{{ null }}">{{ __('Select One') }}</option>
                                            </select>
                                            <br>
                                            @if ($errors->has('pro_category'))
                                                <span class="text-danger">{{ $errors->first('pro_category') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <p class="mb-1"><label for="name" class="card-title font-weight-bold">{{__('Name:')}}</label> &nbsp;<sup><i class="fas fa-star-of-life text-danger"></i></sup></p>
                                    <div class="input-group input-group-lg mb-3">
                                        <input type="text" name="name" id="name"  class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                               placeholder="{{__('Name')}}" value="{{  $product?$product->name:old('name') }}">
                                        <br>
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>

                                    <p class="mb-1"><label for="description" class="card-title font-weight-bold">{{__('Description:')}}</label> &nbsp;<sup><i class="fas fa-star-of-life text-danger"></i></sup></p>
                                    <div class="mb-3">
                                        <textarea name="description" id="description"  class="form-control" rows="12" placeholder="{{__('Write your product\'s description')}}">{!! $product?$product->description:old('description') !!}</textarea>

                                        <br>
                                        @if ($errors->has('description'))
                                            <span class="text-danger">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>

                                    <p class="mb-1"><label for="price" class="card-title font-weight-bold">{{__('Price:')}}</label> &nbsp;<sup><i class="fas fa-star-of-life text-danger"></i></sup></p>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <input type="number" step="0.01" name="price" id="price"  class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                                       placeholder="{{__('Price')}}" value="{{  $product?$product->price:old('price') }}">
                                                <br>
                                                @if ($errors->has('price'))
                                                    <span class="text-danger">{{ $errors->first('price') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-2">
                                                <select name="currency" id="currency" class="form-control">
                                                    <option value="{{ null }}">{{ __('Select One') }}</option>
                                                    @foreach($currencies as $currency)
                                                        <option {{ $product?($product->currency_id === $currency->id?'selected':''):'' }} value="{{ $currency->id }}">{{ $currency->symbol }}</option>
                                                    @endforeach
                                                </select>
                                                <br>
                                                @if ($errors->has('currency'))
                                                    <span class="text-danger">{{ $errors->first('currency') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 profuct-attributs-light mb-3 text-capitalize"> <!-- attributs-content -->
                                        <span id="getProductAllAttribute" datasrc="{{ $product?(count($product->attributeItems) > 0?$product->id:null):null }}"></span>
                                        <div class="col-12 attributeBtnContainer">
                                            <a href="javascript:void(0)" class="addAttributBtn">{{ __('Add your product attributs') }}</a>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-row appendInputs">

                                            </div>
                                        </div>
                                    </div>

                                    <p class="mb-1"><label for="shortDescription" class="card-title font-weight-bold">{{__('Short Description:')}}</label> &nbsp;<sup><i class="fas fa-star-of-life text-danger"></i></sup></p>
                                    <div class="mb-3">
                                        <textarea name="short_description" id="shortDescription"  class="form-control" rows="8" placeholder="{{__('Write your product\'s short description')}}">{!! $product?$product->short_description:old('short_description') !!}</textarea>

                                        <br>
                                        @if ($errors->has('short_description'))
                                            <span class="text-danger">{{ $errors->first('short_description') }}</span>
                                        @endif
                                    </div>

                                    <p class="mb-1"><label for="tags" class="card-title font-weight-bold">{{__('Tags:')}}</label></p>
                                    <div class="input-group input-group-lg mb-3">
                                        <input type="text" name="tags" id="tags"  class="form-control" data-role="tagsinput" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                               placeholder="{{__('Tags')}}" value="{{  $product?$product->tags:old('tags') }}">
                                        <br>
                                        @if ($errors->has('tags'))
                                            <span class="text-danger">{{ $errors->first('tags') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <table class="table table-responsive-sm mb-0">
                                        <thead>
                                        <tr>
                                            <td>
                                                <label for="productStatus">
                                                    <span class="font-weight-bold">{{__('Publish Status')}}</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label for="featuredProduct">
                                                    <span class="font-weight-bold">{{__('Featured')}}</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label for="popularProduct">
                                                    <span class="font-weight-bold">{{__('Popular')}}</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label class="switch float-left">
                                                    <input {{ $product?($product->status?'checked':''):'checked' }} type="checkbox" name="status" id="productStatus">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="switch float-left">
                                                    <input {{ $product?($product->featured?'checked':''):'checked' }} type="checkbox" name="featured" id="featuredProduct">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="switch float-left">
                                                    <input {{ $product?($product->popular?'checked':''):'checked' }} type="checkbox" name="popular" id="popularProduct">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-responsive-sm mt-0">
                                        <thead>
                                        <tr>
                                            <td>
                                                <label for="newArrivalProduct">
                                                    <span class="font-weight-bold">{{__('New Arrival')}}</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label for="bestseller">
                                                    <span class="font-weight-bold">{{__('Bestseller')}}</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label for="trending">
                                                    <span class="font-weight-bold">{{__('Trending')}}</span>
                                                </label>
                                            </td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>
                                                <label class="switch float-left">
                                                    <input {{ $product?($product->new_arrival?'checked':''):'checked' }} type="checkbox" name="new_arrival" id="newArrivalProduct">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="switch float-left">
                                                    <input {{ $product?($product->bestseller?'checked':''):'checked' }} type="checkbox" name="bestseller" id="bestseller">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                            <td>
                                                <label class="switch float-left">
                                                    <input {{ $product?($product->trending?'checked':''):'checked' }} type="checkbox" name="trending" id="trending">
                                                    <span class="slider round"></span>
                                                </label>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                    <p class="mb-1"><label for="unitName" class="card-title font-weight-bold">{{__('Unit Name:')}}</label> </p>
                                    <div class="input-group input-group-lg mb-3">
                                        <input type="text" name="unit_name" id="unitName"  class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                               placeholder="{{__('Default PCS')}}" value="{{  $product?$product->unit_name:old('unit_name') }}">
                                        <br>
                                        @if ($errors->has('unit_name'))
                                            <span class="text-danger">{{ $errors->first('unit_name') }}</span>
                                        @endif
                                    </div>

                                    <p class="mb-1"><label for="grossWeight" class="card-title font-weight-bold">{{__('Gross Weight:')}}</label> <code>{{ __('Input is only allowed the matrix value  KG (kilogram)') }}</code></p>
                                    <div class="input-group input-group-lg mb-3">
                                        <input type="number" step="0.01" name="gross_weight" id="grossWeight"  class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                               placeholder="{{__('Gross Weight EXM: 1')}}" value="{{  $product?$product->gross_weight:old('gross_weight') }}">
                                        <br>
                                        @if ($errors->has('gross_weight'))
                                            <span class="text-danger">{{ $errors->first('gross_weight') }}</span>
                                        @endif
                                    </div>

                                    <p class="mb-1"><label for="sku" class="card-title font-weight-bold">{{__('SKU:')}}</label> <code>{{ __('SKU should be unique for each product') }}</code>&nbsp;<sup><i class="fas fa-star-of-life text-danger"></i></sup></p>
                                    <div class="input-group input-group-lg mb-3">
                                        <input type="text" name="sku" id="sku"  class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                               placeholder="{{__('SKU')}}" value="{{  $product?$product->sku:old('sku') }}">
                                        <br>
                                        @if ($errors->has('sku'))
                                            <span class="text-danger">{{ $errors->first('sku') }}</span>
                                        @endif
                                    </div>

                                    <p class="mb-1"><label for="discount" class="card-title font-weight-bold">{!! __('Discount:'). '&nbsp;<small>('. __('optional').')</small>' !!}</label> <code>{{ __('Please input discount rate only, it will automatically add (%)') }}</code></p>
                                    <div class="input-group input-group-lg mb-3">
                                        <input type="number" step="0.01" name="discount" id="discount"  class="form-control" aria-label="Large" aria-describedby="inputGroup-sizing-sm"
                                               placeholder="{{__('Discount')}}" value="{{  $product?$product->discount:old('discount') }}">
                                        <br>
                                        @if ($errors->has('discount'))
                                            <span class="text-danger">{{ $errors->first('discount') }}</span>
                                        @endif
                                    </div>

                                    <p class="mb-1"><label for="supplier" class="card-title font-weight-bold">{{__('Supplier:')}}</label> <code>{{ __('Please select one supplier') }}</code>&nbsp;<sup><i class="fas fa-star-of-life text-danger"></i></sup></p>
                                    <div class="input-group input-group-lg mb-3">
                                        <select name="supplier" id="supplier" class="form-control">
                                            <option value="{{ null }}">{{ __('Select one') }}</option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->company_name }}</option>
                                            @endforeach
                                        </select>
                                        <br>
                                        @if ($errors->has('supplier'))
                                            <span class="text-danger">{{ $errors->first('supplier') }}</span>
                                        @endif
                                    </div>

                                    <p class="h6 mb-1 text-uppercase">{!! __('Images').' &nbsp;<code>'.__('only PNG files are supported here, and file size will be 800 pixel x 800 pixel').'</code>' !!}</p>
                                    <div class="mb-3">
                                        <div class="product-images" id="productImages">
                                            <div class="input-images"></div>
                                        </div>
                                    </div>

                                    <div class="mb-1">
                                        <div class="row">
                                            @if($product)
                                                @if(count($product->productImages) > 0)
                                                    @foreach($product->productImages as $pImage)
                                                        <div class="col-3 mb-2">
                                                            <img src="{{ asset($pImage->image) }}" alt="category icon" data-role="{{ $pImage->id }}" class="img-fluid w-100 img-thumbnail rounded">
                                                            <i class="fas fa-times-circle imgCloseBtn"></i>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            @endif
                                        </div>
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
    <script src="{{ asset('backend/assets/js/form-summerNote.js') }}"></script>
    <script src="{{ asset('backend/assets/js/product-attributes.js') }}"></script>
    <script src="{{asset('backend/assets/js/ecommerce/product.js')}}"></script>
@endsection
