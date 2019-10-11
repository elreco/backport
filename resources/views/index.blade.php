<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" class="bp-sweetalert2--nopadding">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ Backport::title() }} @if($header) | {{ $header }}@endif</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!--begin::Web font -->
    <!--begin::Web font -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
                google: {"families":["Poppins:300,400,500,600,700"]},
                active: function() {
                    sessionStorage.fonts = true;
                }
            });
        </script>
    {!! Backport::css() !!}

    <script src="{{ Backport::jQuery() }}"></script>
    {!! Backport::headerJs() !!}
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="bp-page--loading-enabled bp-page--loading bp-sweetalert2--nopadding bp-header--static bp-header-mobile--fixed bp-aside--enabled bp-aside--fixed" id="backport">
    <div class="bp-grid bp-grid--hor bp-grid--root">
        <div class="bp-grid__item bp-grid__item--fluid bp-grid bp-grid--ver bp-page">


            {{-- include: Sidebar --}}
            @include('backport::partials.sidebar')

            <!-- begin:: Header Mobile -->
            <div id="bp_header_mobile" class="bp-header-mobile  bp-header-mobile--fixed ">
              <div class="bp-header-mobile__logo">
                <a href="{{ admin_url('/') }}" data-reset="menu">
                    @if(!config('backport.logo'))
                       <img alt="Logo" src="{{ asset('vendor/backport/media/logos/logo.png') }}" />
                    @else
                       {!! config('backport.logo') !!}
                    @endif
                </a>
              </div>
              <div class="bp-header-mobile__toolbar">
                <button class="bp-header-mobile__toolbar-toggler bp-header-mobile__toolbar-toggler--left" id="bp_aside_mobile_toggler"><span></span></button>
              </div>
            </div>
            <!-- end:: Header Mobile -->


            <div class="bp-grid__item bp-grid__item--fluid bp-grid bp-grid--hor bp-wrapper" id="pjax-container">
                <div id="app">
                    @include('backport::partials.header')
                    {{-- begin: Content --}}
                    @yield('content')
                    {!! Backport::script() !!}
                    {{-- end: Content --}}

                    {{-- include: Footer --}}
                    @include('backport::partials.footer')
                </div>
            </div>


        </div>
    </div>

<script>
    function BP() {}
    BP.token = "{{ csrf_token() }}";
</script>

<!-- REQUIRED JS SCRIPTS -->
{!! Backport::js() !!}

</body>
</html>
