{{-- begin: Header
<div id="bp_header" class="bp-header bp-grid__item " data-kheader-minimize="on">
    {{-- begin: Header title
    <div class="bp-header__title">
        {{-- Title and description
        <h3 class="bp-header__title-title">
            {{ $header ?: trans('admin.title') }} {{-- <small>{{ $description ?: trans('admin.description') }}</small>
        </h3> --}}
        {{-- begin: Breadcrumbs
        <div class="bp-header__title-breadcrumbs">
            @if ($breadcrumb)
                <a href="{{ admin_url('/') }}" class="bp-header__title-breadcrumb-home"><i class="flaticon-home-2"></i></a>
                @foreach($breadcrumb as $item)
                    @if($loop->last)
                        <span class="bp-header__title-breadcrumb-separator"></span>
                        <a href="" class="bp-header__title-breadcrumb-link">
                            @if (array_has($item, 'icon'))
                                <i class="fa fa-{{ $item['icon'] }}"></i>
                            @endif
                            {{ $item['text'] }}
                        </a>
                    @else
                        <span class="bp-header__title-breadcrumb-separator"></span>
                        <a href="{{ admin_url(array_get($item, 'url')) }}" class="bp-header__title-breadcrumb-link">
                            @if (array_has($item, 'icon'))
                                <i class="fa fa-{{ $item['icon'] }}"></i>
                            @endif
                            {{ $item['text'] }}
                        </a>
                    @endif
                @endforeach
            @elseif(config('backport.enable_default_breadcrumb'))
                <a href="{{ admin_url('/') }}" class="bp-header__title-breadcrumb-home"><i class="flaticon-home-2"></i></a>
                @for($i = 2; $i <= count(Request::segments()); $i++)
                    <span class="bp-header__title-breadcrumb-separator"></span>
                    <span  class="bp-header__title-breadcrumb-link">
                        {{ucfirst(Request::segment($i))}}
                    </span>
                @endfor
            @endif
        </div>
        {{-- end: Breadcrumbs
    </div>
    {{-- end: Header title

    <!-- begin:: Header Topbar -->
    <div class="bp-header__topbar">


    </div>

    <!-- end:: Header Topbar -->
</div>
{{-- end: Header --}}


{{--
<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ admin_base_path('/') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">{!! config('backport.logo-mini', config('backport.name')) !!}</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{!! config('backport.logo', config('backport.name')) !!}</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        {!! Backport::getNavbar()->render('left') !!}

        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

                {!! Backport::getNavbar()->render() !!}

                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        <img src="{{ Backport::user()->avatar }}" class="user-image" alt="User Image">
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs">{{ Backport::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            <img src="{{ Backport::user()->avatar }}" class="img-circle" alt="User Image">

                            <p>
                                {{ Backport::user()->name }}
                                <small>Member since admin {{ Backport::user()->created_at }}</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ admin_base_path('auth/setting') }}" class="btn btn-default btn-flat">{{ trans('admin.setting') }}</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ admin_base_path('auth/logout') }}" class="btn btn-default btn-flat">{{ trans('admin.logout') }}</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                {{--<li>--}}
                    {{--<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>--}}
                {{--</li>--}}
                {{--
            </ul>
        </div>
    </nav>
</header>
 --}}
