<div class="btn-group mr-1">
    <button type="button" data-toggle="collapse" data-target="#{{ $filterID }}" aria-expanded="true" aria-controls="{{ $filterID }}" class="btn btn-sm btn-secondary {{ $btn_class }} {{ $expand ? 'collapsed' : '' }}"  title="{{ trans('admin.filter') }}">
        <i class="fa fa-filter"></i><span class="d-none d-sm-inline-block">&nbsp;&nbsp;{{ trans('admin.filter') }}</span>
    </button>
    @if($scopes->isNotEmpty())
        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span>{{ $current_label }}</span>
            <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu">
            @foreach($scopes as $scope)
                {!! $scope->render() !!}
            @endforeach
            <div class="dropdown-divider"></div>
            <a href="{{ $url_no_scopes }}" class="dropdown-item">{{ trans('admin.cancel') }}</a>
        </div>
    @endif
</div>
