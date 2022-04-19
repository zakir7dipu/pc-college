<div id="wrapper-header">
    <!-- NAVABR -->
    <nav class="navbar navbar-expand navbar-dark navbar-danger bg-dark">
        <!-- NAVABR NAV - LEFT -->
        <ul class="navbar-nav">
            <!-- NAV ITEM - SIDEBARTOGGLE -->
            <li class="nav-item">
                <a class="nav-link" href="javascript:void(0);" data-toggle="class" data-target="#wrapper" toggle-class="toggled" >
                    <i data-toggle="switch" data-iconFirst="menu" data-iconSecond="close" class="material-icons">menu</i>
                </a>
            </li>
        </ul>

        <!-- NAVABR NAV - RIGHT -->
        <ul class="navbar-nav ml-auto">
            <!-- NAV ITEM - MESSAGES -->
{{--            <li class="nav-item dropdown">--}}
{{--                <a class="nav-link dropdown-toggle no-caret" href="http://bdcoder.com" id="messages" data-toggle="dropdown" aria-expanded="false">--}}
{{--                    <i class="material-icons ">mail_outline</i>--}}
{{--                    <span class="badge badge-md">3</span>--}}
{{--                </a>--}}

{{--                <div class="dropdown-menu">--}}

{{--                    <div class="dropdown-header py-2">--}}
{{--                        <h6 class="dropdown-title">message</h6>--}}
{{--                        <a  href="javascript:void(0);" class="dropdown-link ml-auto"><i class="material-icons">more_horiz</i></a>--}}
{{--                    </div>--}}

{{--                    <div class="dropdown-block p-0 style-scroll"  style="max-height: 303px">--}}
{{--                        <div class="box-message">--}}
{{--                            <ul class="message-list">--}}
{{--                                <li class="message-item">--}}
{{--                                    <div class="message-img">--}}
{{--                                        <img src="{{ asset('backend/assets/img/profile/male.jpg') }}" class=" img-fluid">--}}
{{--                                        <span class="badge badge-state bg-danger"></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="message-content">--}}
{{--                                        <a href="javascript:void(0);" class="message-link">Paul Harris </a>--}}
{{--                                        <span class="badge badge-md badge-info float-right">2</span>--}}
{{--                                        <p class="message-text">Iungeretur omnis contracta infinita potest.</p>--}}
{{--                                        <span class="message-time">1 mn ago</span>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="message-item">--}}
{{--                                    <div class="message-img">--}}
{{--                                        <img src="{{ asset('backend/assets/img/profile/male.jpg') }}" class=" img-fluid">--}}
{{--                                        <span class="badge badge-state bg-warning"></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="message-content">--}}
{{--                                        <a href="javascript:void(0);" class="message-link">Sophia Garcia</a>--}}
{{--                                        <span class="badge badge-md badge-info float-right">1</span>--}}
{{--                                        <p class="message-text">Summos consternuntur pedites.</p>--}}
{{--                                        <span class="message-time">2 mn ago</span>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="message-item">--}}
{{--                                    <div class="message-img">--}}
{{--                                        <img src="{{ asset('backend/assets/img/profile/male.jpg') }}" class=" img-fluid">--}}
{{--                                        <span class="badge badge-state bg-success"></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="message-content">--}}
{{--                                        <a href="javascript:void(0);" class="message-link">Robert Miller</a>--}}
{{--                                        <p class="message-text">Legum committerentur saltem licet.</p>--}}
{{--                                        <span class="message-time">30 mn ago</span>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="message-item">--}}
{{--                                    <div class="message-img">--}}
{{--                                        <img src="{{ asset('backend/assets/img/profile/male.jpg') }}" class=" img-fluid">--}}
{{--                                        <span class="badge badge-state bg-success"></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="message-content">--}}
{{--                                        <a href="javascript:void(0);" class="message-link">Zac Walker</a>--}}
{{--                                        <p class="message-text">Squalor autem autem autem nobis.</p>--}}
{{--                                        <span class="message-time">1 hour ago</span>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="message-item">--}}
{{--                                    <div class="message-img">--}}
{{--                                        <img src="{{ asset('backend/assets/img/profile/male.jpg') }}" class=" img-fluid">--}}
{{--                                        <span class="badge badge-state bg-danger"></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="message-content">--}}
{{--                                        <a href="javascript:void(0);" class="message-link">Ashley Parker</a>--}}
{{--                                        <p class="message-text">Nec fruatur sane Gabini expectet.</p>--}}
{{--                                        <span class="message-time">4 hours ago</span>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="message-item">--}}
{{--                                    <div class="message-img">--}}
{{--                                        <img src="{{ asset('backend/assets/img/profile/male.jpg') }}" class=" img-fluid">--}}
{{--                                        <span class="badge badge-state bg-success"></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="message-content">--}}
{{--                                        <a href="javascript:void(0);" class="message-link">Natalie Kelly</a>--}}
{{--                                        <p class="message-text">Squalor autem autem autem nobis.</p>--}}
{{--                                        <span class="message-time">1 day ago</span>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                                <li class="message-item">--}}
{{--                                    <div class="message-img">--}}
{{--                                        <img src="{{ asset('backend/assets/img/profile/male.jpg') }}" class=" img-fluid">--}}
{{--                                        <span class="badge badge-state bg-danger"></span>--}}
{{--                                    </div>--}}
{{--                                    <div class="message-content">--}}
{{--                                        <a href="javascript:void(0);" class="message-link">Jason Nelson</a>--}}
{{--                                        <p class="message-text">Quod stationibus extimas itinere huius.</p>--}}
{{--                                        <span class="message-time">3 days ago</span>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="dropdown-footer py-2 justify-content-center">--}}
{{--                        <a class="dropdown-link" href="javascript:void(0);"><i class="material-icons">more_horiz</i></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </li>--}}
            <!-- NAV ITEM - NOTIFICATIONS -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle no-caret" href="javascript:void(0);" id="notifications" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">notifications_none</i>
                    <span class="badge badge-md">{{ count($unreadContactMessages) }}</span>
                </a>
                @if(count($unreadContactMessages) > 0)
                    <div class="dropdown-menu">

                        <div class="dropdown-header py-2">
                            <h6 class="dropdown-title">{{ __('contact message') }}</h6>
                            <a  href="javascript:void(0);" class="dropdown-link ml-auto"><i class="material-icons">more_horiz</i></a>
                        </div>

                        <div class="dropdown-block p-0 style-scroll"  style="max-height: 303px">
                            <div class="box-notification" >
                                <ul class="notification-list">
                                    @foreach($unreadContactMessages as $key => $message)
                                        <li class="notification-item">
                                            <div class="notification-icon bg-info"><i class="material-icons">mail</i></div>
                                            <div class="notification-content">
                                                <a href="javascript:void(0)" class="notification-link">{{ $message->contact_name }}</a>
                                                <p class="notification-text">{{ $message->contact_email }}</p>
                                            </div>
                                            <div class="notification-time">{{ date('M d, y', strtotime($message->created_at)) }}</div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="dropdown-footer py-2 justify-content-center">
                            <a class="dropdown-link" href="javascript:void(0);"><i class="material-icons">more_horiz</i></a>
                        </div>
                    </div>
                @endif
            </li>
            <!-- NAV ITEM - PARAMETRES -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle no-caret d-flex align-items-center" href="javascript:void(0);"  id="settings" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())

                        <img class="rounded-circle" width="32px" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                    @else
                        <img src="{{ asset('backend/assets/img/profile/male.jpg')  }}" class="rounded-circle " width="32px">
                    @endif

                </a>
                <div class="dropdown-menu" class="languse">
                    <p class="text-center my-1"><small class="text-muted">{{ __('Manage Accounts') }}</small></p>
                    <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="material-icons">person</i> {{ __('Profile') }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logOutForm').submit();"><i class="material-icons">power_settings_new</i> {{ __('Log Out') }}
                        <form action="{{ route('logout') }}" method="post" id="logOutForm">
                            @csrf
                        </form>
                    </a>
                </div>
            </li>
        </ul>

    </nav>
</div>
