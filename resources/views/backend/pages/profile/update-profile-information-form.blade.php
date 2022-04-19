<div class="row">
    <div class="col-12">
        <div class="card card-dark bg-dark py-1">

            <div class="card-body p-4">
                <div class="row">
                    <div class="col-md-4 py-5">
                        <div class="h5">{{ __('Profile Information') }}</div>
                        <p class="">{{ __('Update your account profile information.') }}</p>
                    </div>
                    <div class="col-md-8">
                        <form action="{{ route('admin.profile') }}" method="post" enctype="multipart/form-data" class="wma-form">
                            @csrf
                            <div class="">

                                <p class="h6 mb-3">{{ __('Photo') }}</p>
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())

                                            <img class="rounded-circle" width="150" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                        @else
                                            <img src="{{ asset('backend/assets/img/profile/male.jpg')  }}" class="rounded-circle " width="150">
                                        @endif
                                    </div>

                                    <div class="col-md-6">
                                        <div class="">
                                            <div class="admin-image" id="admin_image">
                                                <div class="input-images"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <p class="mb-1 font-weight-bold"><label for="name">{{ __('Name') }}:</label> </p>
                                        <div class="input-group input-group-lg mb-3">
                                            <input type="text" name="name" id="name" value="{{Auth::user()->name}}" class="form-control rounded"
                                                   aria-label="Large" placeholder="{{__('Name in English')}}" aria-describedby="inputGroup-sizing-sm">
                                            <br>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>

                                        <p class="mb-1 font-weight-bold"><label for="phone">{{ __('Phone') }}:</label> </p>
                                        <div class="input-group input-group-lg mb-3">
                                            <input type="tel" name="phone" id="phone" value="{{Auth::user()->phone}}" class="form-control rounded"
                                                   aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                                            <br>
                                            @if ($errors->has('phone'))
                                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                                            @endif
                                        </div>

                                        <p class="mb-1 font-weight-bold"><label for="email">{{ __('Email') }}:</label> </p>
                                        <div class="input-group input-group-lg mb-3">
                                            <input type="email" name="email" id="email" value="{{Auth::user()->email}}" class="form-control rounded"
                                                   aria-label="Large" aria-describedby="inputGroup-sizing-sm">
                                            <br>
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="float-right">
                                    <button class="btn btn-wave-light rounded btn-danger btn-lg" type="submit">{{ __('Save') }}</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="col-12">
        <div class="card card-dark bg-dark py-1">
            <div class="card-body p-4">
                <form action="{{ route('admin.profile-info') }}" method="post">
                    @csrf

                    <h6 class="h6 text-center text-left card-title">{{__('Address')}}</h6>

                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="district" class="card-title font-weight-bold">{{__('country')}}</label>
                                <input type="text" name="country" id="country" list="countryList" class="form-control rounded" required value="{{ Auth::user()->address?Auth::user()->address->country:old('country') }}" placeholder="{{ __('Type your country name') }}">
                                <datalist id="countryList">
                                    <option>Bangladesh</option>
                                </datalist>
                            </div>

                            <div class="form-group">
                                <label for="district" class="card-title font-weight-bold">{{__('District')}}</label>
                                <input type="text" name="district" id="district" list="districtList" class="form-control rounded" required value="{{ Auth::user()->address?Auth::user()->address->district:old('district') }}" placeholder="{{ __('Type your district name') }}">
                                <datalist id="districtList">
                                    @foreach($districts as $district)
                                        <option>{{ $district->name }}</option>
                                    @endforeach
                                </datalist>
                            </div>

                            <div class="form-group">
                                <label for="thana" class="card-title font-weight-bold">{{__('Thana')}}</label>
                                <input type="text" name="thana" id="thana" list="thanaList" class="form-control rounded" required value="{{ Auth::user()->address?Auth::user()->address->thana:old('thana') }}" placeholder="{{ __('Type your thana name') }}">
                                <datalist id="thanaList">
                                    @foreach($districts as $district)
                                        @foreach($district->thana as $thana)
                                            <option value="{{ $thana->name }}">{{ $district->name }}</option>
                                        @endforeach
                                    @endforeach
                                </datalist>
                            </div>

                            <div class="form-group">
                                <label for="city" class="card-title font-weight-bold">{{__('City / Village')}}</label>
                                <input type="text" name="city" id="city" class="form-control rounded" required value="{{ Auth::user()->address?Auth::user()->address->city:old('city') }}" placeholder="{{ __('Type your city') }}">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="postOffice" class="card-title font-weight-bold">{{__('Post Office')}}</label>
                                <input type="text" name="post_code" id="postOffice" list="postOfficeList" class="form-control rounded" required value="{{ Auth::user()->address?Auth::user()->address->post_code:old('post_code') }}" placeholder="{{ __('Type your post code') }}">
                                <datalist id="postOfficeList">
                                    @foreach($districts as $district)
                                        @foreach($district->postOffice as $postOffice)
                                            <optgroup label="{{ $district->name }}">
                                                <option value="{{ $postOffice->post_code }}">{{ $postOffice->name }}</option>
                                            </optgroup>
                                        @endforeach
                                    @endforeach
                                </datalist>
                            </div>

                            <div class="form-group">
                                <label for="sector" class="card-title font-weight-bold">{!! __('Sector / Block').' <small>('.__('optional').')</small>' !!}</label>
                                <input type="text" name="sector" id="sector" class="form-control rounded" value="{{ Auth::user()->address?Auth::user()->address->sector:old('sector') }}" placeholder="{{ __('Type your sector / block name') }}">
                            </div>

                            <div class="form-group">
                                <label for="road" class="card-title font-weight-bold">{!! __('Road').' <small>('.__('optional').')</small>' !!}</label>
                                <input type="text" name="road" id="road" class="form-control rounded" value="{{ Auth::user()->address?Auth::user()->address->road:old('road') }}" placeholder="{{ __('Type your road name') }}">
                            </div>

                            <div class="form-group">
                                <label for="house" class="card-title font-weight-bold">{!! __('House').' <small>('.__('optional').')</small>' !!}</label>
                                <input type="text" name="house" id="house" class="form-control rounded" value="{{ Auth::user()->address?Auth::user()->address->house:old('house') }}" placeholder="{{ __('Type your house name') }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group px-5 text-center">
                        <button type="submit" class="btn btn-danger w-50">{{__('Save')}}</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
