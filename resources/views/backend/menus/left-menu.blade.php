<div id="wrapper-left">
    <!-- SIDEBAR -->
    <div class="sidebar sidebar-dark sidebar-danger bg-dark">
        <!-- SIDEBAR HEADER -->
        <div class="sidebar-header border-fade">
            <!-- SIDEBAR BRAND -->
            <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
                <!-- SIDEBAR BRAND IMG -->
                {!! $generalSettings?'<img  class="img-fluid sidebar-brand-img w-100" src="'. asset($generalSettings->site_tag_image) .'" />':'<img  class="sidebar-brand-img" src="'.asset('backend/assets/img/logo/red.png').'" />' !!}
                <!-- SIDEBAR BRAND TEXT -->
            </a>
            <!-- SIDEBAR CLOSE -->
        </div>
        <!-- SIDEBAR CONTAINER -->
        <div class="sidebar-container style-scroll-dark">
            <!-- SIDEBAR PROFILE -->
            <div class="sidebar-profile border-fade">
                <!-- SIDEBAR PROFILE IMG -->
                <div class="d-flex align-items-center">
                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                        <img src="{{ auth::user()->profile_photo_url }}" alt="{{ auth::user()->name }}" class="img-fluid img-thumbnail sidebar-profile-img" />
                    @else
                        <img src="{{ asset('backend/assets/img/profile/male.jpg') }}"
                             class="img-fluid img-thumbnail sidebar-profile-img" />
                    @endif
                </div>
                <!-- SIDEBAR PROFILE INFO -->
                <div class="sidebar-profile-info">
                    <h6>{{ auth()->user()->name }}</h6>
                    <!-- SIDEBAR ACTIONS -->
                    <div class="sidebar-actions">
                        <a href="{{ route('admin.profile') }}" class="keep"><i class="material-icons">person_outline</i></a>
                        <a href="{{ route('admin.contact-message.index') }}" ><i class="material-icons" class="m-icon">mail_outline</i></a>
                        <a href="{{ route('admin.settings.index') }}"><i class="material-icons" class="m-icon">settings</i></a>
                    </div>
                </div>
            </div>
            <!-- SIDEBAR NAV -->
            <ul class="sidebar-nav">
                <!-- NAV dashboard -->
                <li class="nav-item {{ request()->is('admin/dashboard') ?'active':'' }}">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="material-icons">{{ __('dashboard') }}</i>
                        <span class="link-text">{{ __('dashboard') }}</span>
                    </a>
                </li>
                <li class="nav-divider"></li>
                <!-- NAV SETTINGS -->
                <li class="nav-item has-dropdown {{ request()->is('admin/settings*') ?'active':'' }}">
                    <a href="javascript:void(0);" class="nav-link">
                        <i class="material-icons">settings</i>
                        <span class="link-text">{{ __('Settings') }}</span>{{ __('') }}
                        <span class="badge badge-md"><span class="material-icons h6" >chevron_right</span></span>
                    </a>
                    <ul class="dropdown-list">
                        <li><a href="{{ route('admin.settings.index') }}" class="nav-link"> <i class="material-icons">chevron_right</i> <span class="link-text">{{ __('General Settings') }}</span></a></li>
                        <li><a href="{{ route('admin.settings.smtp') }}" class="nav-link"> <i class="material-icons">chevron_right</i> <span class="link-text">{{ __('SMTP Settings') }}</span></a></li>
                        <li><a href="{{ route('admin.settings.sms') }}" class="nav-link"> <i class="material-icons">chevron_right</i> <span class="link-text">{{ __('SMS Settings') }}</span></a></li>
                        <li><a href="{{ route('admin.settings.api') }}" class="nav-link"> <i class="material-icons">chevron_right</i> <span class="link-text">{{ __('API Settings') }}</span></a></li>
                        <li><a href="{{ route('admin.settings.social-media-link') }}" class="nav-link"> <i class="material-icons">chevron_right</i> <span class="link-text">{{ __('Social Media Link Settings') }}</span></a></li>
                        <li><a href="{{ route('admin.settings.payment.index') }}" class="nav-link"> <i class="material-icons">chevron_right</i> <span class="link-text">{{ __('Payment Settings') }}</span></a></li>
                        <li><a href="{{ route('admin.settings.menu.index') }}" class="nav-link"> <i class="material-icons">chevron_right</i> <span class="link-text">{{ __('Menu Settings') }}</span></a></li>
                    </ul>
                </li>
                <!-- NAV DIVIDER -->
                <li class="nav-divider"></li>
            </ul>
        </div>
    </div>
</div>
