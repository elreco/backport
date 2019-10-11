    <!-- begin:: Aside -->
    <button class="bp-aside-close " id="bp_aside_close_btn"><i class="la la-close"></i></button>
    <div class="bp-aside  bp-aside--fixed 	bp-grid__item bp-grid bp-grid--desktop bp-grid--hor-desktop" id="bp_aside">

      <!-- begin:: Aside -->
      <div class="bp-aside__brand   bp-grid__item" id="bp_aside_brand">
        <div class="bp-aside__brand-logo">
          <a href="{{ admin_url('/') }}" data-reset="menu">
             @if(!config('backport.logo'))
                <img alt="Logo" src="{{ asset('vendor/backport/media/logos/logo.png') }}" />
             @else
                {!! config('backport.logo') !!}
             @endif
          </a>
        </div>
        <div class="bp-aside__brand-tools">
          <button class="bp-aside__brand-aside-toggler bp-aside__brand-aside-toggler--left" id="bp_aside_toggler"><span></span></button>
        </div>
      </div>

      <!-- end:: Aside -->

      <!-- begin:: Aside Menu -->
      <div class="bp-aside-menu-wrapper	bp-grid__item bp-grid__item--fluid" id="bp_aside_menu_wrapper">
        <div id="bp_aside_menu" class="bp-aside-menu " data-kmenu-vertical="1" data-kmenu-scroll="1" data-kmenu-dropdown-timeout="500">

          <ul class="bp-menu__nav ">
            @each('backport::partials.menu', Backport::menu(), 'item')
          </ul>
        </div>
      </div>

      <!-- end:: Aside Menu -->
    </div>
    <!-- end:: Aside -->
