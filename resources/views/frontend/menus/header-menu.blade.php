<!-- Strat Header Section -->
<header class="header clearfix">

    <!-- Header top start -->
    <div class="top_header">
        <div class="row">
            <div class="col-lg-2 col-md-12 col-sm-12">
                <div class="header-topbar-col text-center ">
                    <div class="logo px-0">
                        <a href="{{ '/' }}" >
                            <img src="" class="img img-fluid d-lg-inline d-block mx-auto" alt="logo">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header top end -->

    <div class="menu-style menu-hover-2 clearfix">
        <!-- main-navigation start -->
        <div class="main-navigation main-mega-menu animated">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <!-- header dropdown buttons end-->
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbar-collapse-1" aria-controls="navbar-collapse-1" aria-expanded="false"
                        aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbar-collapse-1">
                    <ul class="navbar-nav ml-5">
                        <!-- mega-menu end -->
                        @foreach($menus as $menu)
                            @if($menu->href == '/admin/login')
                                @auth()
                                    <li class="nav-item">
                                        <a href="{{ auth()->user()->userType->id < 3 ? route('index.dashboard'):route('dashboard') }}" class="nav-link {{ config('app.locale') == 'en'?'text-roboto-bold':'text-kalpurush-bold' }}" aria-haspopup="true" aria-expanded="false">{{ __('Dashboard') }}</a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a href="{{ $menu->href }}" class="nav-link {{ config('app.locale') == 'en'?'text-roboto-bold':'text-kalpurush-bold' }}" target="{{ $menu->target }}" aria-haspopup="true" aria-expanded="false">{{ config('app.locale') == 'en'?__($menu->text):($menu->title?__($menu->title):__($menu->text)) }}</a>
                                    </li>
                                @endauth
                            @else
                                <li class="nav-item {{ $menu->childs->count() > 0 ? 'dropdown':'' }} ">
                                    <a href="{{ $menu->childs->count() > 0? 'javascript:void(0)':$menu->href }}" class="nav-link {{ config('app.locale') == 'en'?'text-roboto-bold':'text-kalpurush-bold' }} {{ $menu->childs->count() > 0 ?'dropdown-toggle':'' }}" target="{{ $menu->target }}"  {{ $menu->childs->count() > 0 ?'data-toggle="dropdown"':'' }} aria-haspopup="true" aria-expanded="false">{{ config('app.locale') == 'en'?__($menu->text):($menu->title?__($menu->title):__($menu->text)) }}</a>
                                    @if($menu->childs->count() > 0)
                                        <div class="dropdown-menu" aria-labelledby="first-dropdown">
                                            @foreach($menu->childs()->orderBy('position','ASC')->get() as $menuItem1)
                                                @if($menuItem1->href == '/admin/login')
                                                    @auth()
                                                        <div class="dropdown">
                                                            <a href="{{ auth()->user()->userType->id < 3 ? route('index.dashboard'):route('dashboard') }}" class="dropdown-item {{ config('app.locale') == 'en'?'text-roboto-bold':'text-kalpurush-bold' }}">{{ __('Dashboard') }}</a>
                                                        </div>
                                                    @else
                                                        <div class="dropdown">
                                                            <a class="dropdown-item {{ config('app.locale') == 'en'?'text-roboto-bold':'text-kalpurush-bold' }}" href="{{ $menuItem1->href }}" target="{{ $menuItem1->target }}">{{ config('app.locale') == 'en'?__($menuItem1->text):($menuItem1->title?__($menuItem1->title):__($menuItem1->text)) }}</a>
                                                        </div>
                                                    @endauth
                                                @else
                                                    <div class="dropdown">
                                                        <a class="dropdown-item {{ config('app.locale') == 'en'?'text-roboto-bold':'text-kalpurush-bold' }} {{ $menuItem1->childs->count() > 0 ?'dropdown-toggle':'' }}" href="{{ $menuItem1->childs->count() > 0? 'javascript:void(0)':$menuItem1->href }}" target="{{ $menuItem1->target }}" {{ $menuItem1->childs->count() > 0 ?'data-toggle="dropdown"':'' }} aria-haspopup="true" aria-expanded="false">{{ config('app.locale') == 'en'?__($menuItem1->text):($menuItem1->title?__($menuItem1->title):__($menuItem1->text)) }}</a>
                                                        @if($menuItem1->childs->count() > 0)
                                                            <div class="dropdown-menu" aria-labelledby="second-dropdown">
                                                                @foreach($menuItem1->childs()->orderBy('position','ASC')->get() as $menuItem2)
                                                                    @if($menuItem2->href == '/admin/login')
                                                                        @auth()
                                                                            <div class="dropdown">
                                                                                <a href="{{ auth()->user()->userType->id < 3 ? route('index.dashboard'):route('dashboard') }}" class="dropdown-item {{ config('app.locale') == 'en'?'text-roboto-bold':'text-kalpurush-bold' }}">{{ __('Dashboard') }}</a>
                                                                            </div>
                                                                        @else
                                                                            <div class="dropdown">
                                                                                <a class="dropdown-item {{ config('app.locale') == 'en'?'text-roboto-bold':'text-kalpurush-bold' }}" href="{{ $menuItem2->href }}" target="{{ $menuItem2->target }}">{{ config('app.locale') == 'en'?__($menuItem2->text):($menuItem2->title?__($menuItem2->title):__($menuItem2->text)) }}</a>
                                                                            </div>
                                                                        @endauth
                                                                    @else
                                                                        <div class="dropdown">
                                                                            <a class="{{ $menuItem2->childs->count() > 0 ?'dropdown-toggle':'' }} {{ config('app.locale') == 'en'?'text-roboto-bold':'text-kalpurush-bold' }} dropdown-item" href="{{ $menuItem2->childs->count() > 0 ? 'javascript:void(0)':$menuItem2->href }}" target="{{ $menuItem2->target }}" {{ $menuItem2->childs->count() > 0 ?'data-toggle="dropdown"':'' }} aria-haspopup="true" aria-expanded="false">{{ config('app.locale') == 'en'?__($menuItem2->text):($menuItem2->title?__($menuItem2->title):__($menuItem2->text)) }}</a>
                                                                            @if($menuItem2->childs->count() > 0)
                                                                                <div class="dropdown-menu {{ config('app.locale') == 'en'?'text-roboto-bold':'text-kalpurush-bold' }}" aria-labelledby="third-dropdown">
                                                                                    @foreach($menuItem2->childs()->orderBy('position','ASC')->get() as $menuItem3)
                                                                                        @if($menuItem3->href == '/admin/login')
                                                                                            @auth()
                                                                                                <a class="dropdown-item {{ config('app.locale') == 'en'?'text-roboto-bold':'text-kalpurush-bold' }}" href="{{ auth()->user()->userType->id < 3 ? route('index.dashboard'):route('dashboard') }}">{{ __('Dashboard') }}</a>
                                                                                            @else
                                                                                                <a class="dropdown-item {{ config('app.locale') == 'en'?'text-roboto-bold':'text-kalpurush-bold' }}" href="{{ $menuItem3->href }}" target="{{ $menuItem3->target }}">{{ config('app.locale') == 'en'?__($menuItem3->text):($menuItem3->title?__($menuItem3->title):__($menuItem3->text)) }}  </a>
                                                                                            @endauth

                                                                                        @else
                                                                                            <a class="dropdown-item {{ config('app.locale') == 'en'?'text-roboto-bold':'text-kalpurush-bold' }}" href="{{ $menuItem3->href }}" target="{{ $menuItem3->target }}" {{ $menuItem3->childs->count() > 0 ?'data-toggle="dropdown"':'' }} aria-haspopup="true" aria-expanded="false">{{ config('app.locale') == 'en'?__($menuItem3->text):($menuItem3->title?__($menuItem3->title):__($menuItem3->text)) }}  </a>
                                                                                        @endif
                                                                                    @endforeach
                                                                                </div>
                                                                            @endif
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    @endif
                                </li>
                        @endif
                    @endforeach
                        <li class="nav-item float-right">
                            <a href="javascript:void(0)" class="nav-link" target="" aria-haspopup="true" aria-expanded="false">
                                <button class="custom-btn btn-12"><span>Click!</span><span>Read More</span></button>
                            </a>
                        </li>

                    <!-- mega-menu start -->
                    </ul>
                </div>
            </nav>
        </div>
        <!-- main-navigation end -->
    </div>
</header>
