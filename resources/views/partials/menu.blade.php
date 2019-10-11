@if(Backport::user()->visible($item['roles']) && (empty($item['permission']) ?: Backport::user()->can($item['permission'])))
    @if(!isset($item['children']))
        {{-- Menu Seperator (Item without URI) --}}
        @if(!isset($item['uri']) || (isset($item['uri']) && $item['uri'] == ""))
          <li class="bp-menu__section ">
            <h4 class="bp-menu__section-text">{{ $item['title'] }}</h4>
            <i class="bp-menu__section-icon fas fa-ellipsis-h"></i>
          </li>
        @else
            <li class="bp-menu__item {{ request()->is(substr(admin_base_path($item['uri']), 1) . '*') && $item['uri'] != '/' ? 'bp-menu__item--active' : '' }}" aria-haspopup="true">
                @if(url()->isValidUrl($item['uri']))
                    <a href="{{ $item['uri'] }}" target="_blank"  class="bp-menu__link">
                @else
                     <a href="{{ admin_base_path($item['uri']) }}"  class="bp-menu__link">
                @endif
                    @if($item['parent_id'])
                        <i class="bp-menu__link-bullet bp-menu__link-bullet--dot"><span></span></i>

                    @else
                        <i class="bp-menu__link-icon fa {{$item['icon']}}"></i>
                    @endif
                    @if (Lang::has($titleTranslation = 'admin.menu_titles.' . trim(str_replace(' ', '_', strtolower($item['title'])))))
                        <span class="bp-menu__link-text">{{ __($titleTranslation) }}</span>
                    @else
                        <span class="bp-menu__link-text">{{ $item['title'] }}</span>
                    @endif
                </a>
            </li>
        @endif
    @else
        <li class="bp-menu__item  bp-menu__item--submenu" aria-haspopup="true">
            <a href="javascript:;" class="bp-menu__link bp-menu__toggle">
                <i class="bp-menu__link-icon fa {{ $item['icon'] }}"></i>
                @if (Lang::has($titleTranslation = 'admin.menu_titles.' . trim(str_replace(' ', '_', strtolower($item['title'])))))
                    <span class="bp-menu__link-text">{{ __($titleTranslation) }}</span>
                @else
                    <span class="bp-menu__link-text">{{ $item['title'] }}</span>
                @endif
                <i class="bp-menu__ver-arrow la la-angle-right"></i>
            </a>
            <div class="bp-menu__submenu "><span class="bp-menu__arrow"></span>
                <ul class="bp-menu__subnav">
                    @foreach($item['children'] as $item)
                        @include('backport::partials.menu', $item)
                    @endforeach
                </ul>
            <div>
        </li>
    @endif
@endif
