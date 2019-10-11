@extends('backport::index', ['header' => $header])

@section('content')

    <div class="bp-content	bp-grid__item bp-grid__item--fluid bp-grid bp-grid--hor">
        <div class="bp-content__head	bp-grid__item">
            <h3 class="bp-content__head-title">
                {{ $header ?: trans('admin.title') }}
            </h3>
            <div class="bp-content__head-breadcrumbs">
                @if ($breadcrumb)
                    <a href="{{ admin_url('/') }}" class="bp-content__head-breadcrumb-home" data-reset="menu"><i class="far fa-home"></i></a>
                    @foreach($breadcrumb as $item)
                        @if($loop->last)
                            <span class="bp-content__head-breadcrumb-separator"></span>
                            <a href="" class="bp-content__head-breadcrumb-link">
                                @if (array_has($item, 'icon'))
                                    <i class="fa fa-{{ $item['icon'] }}"></i>
                                @endif
                                {{ $item['text'] }}
                            </a>
                        @else
                            <span class="bp-content__head-breadcrumb-separator"></span>
                            <a href="{{ admin_url(array_get($item, 'url')) }}" class="bp-content__head-breadcrumb-link">
                                @if (array_has($item, 'icon'))
                                    <i class="fa fa-{{ $item['icon'] }}"></i>
                                @endif
                                {{ $item['text'] }}
                            </a>
                        @endif
                    @endforeach
                @elseif(config('backport.enable_default_breadcrumb'))
                    <a href="{{ admin_url('/') }}" class="bp-content__head-breadcrumb-home" data-reset="menu"><i class="far fa-home"></i></a>
                    @for($i = 2; $i <= count(Request::segments()); $i++)
                        <span class="bp-content__head-breadcrumb-separator"></span>
                        <span  class="bp-content__head-breadcrumb-link">
                            {{ucfirst(Request::segment($i))}}
                        </span>
                    @endfor
                @endif
            </div>
        </div>



        @include('backport::partials.alerts')
        @include('backport::partials.exception')
        @include('backport::partials.toastr')

        {!! $content !!}

    </div>
    <script>
    var menu = $('.bp-menu__nav');
    $('[data-reset="menu"]').on('click', function () {
        menu.find('.bp-menu__item--active').removeClass('bp-menu__item--active');
        menu.find('.bp-menu__item--open').removeClass('bp-menu__item--open');
        menu.find('[href="/admin"]').parent().addClass('bp-menu__item--active');
    });
    </script>
@endsection
