<span  style="margin-left: -5px; margin-right: 15px; padding-top: 7px;">
    <input type="checkbox" class="{{ $selectAllName }}" />
</span>
@if(!$isHoldSelectAllCheckbox)
<div class="btn-group mr-1">
    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" title="{$export}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-exclamation"></i><span class="hidden-xs"><span class="hidden-xs"> {{ trans('admin.action') }}</span></span>
    </button>
    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
        @foreach($actions as $action)
            <a href="#" class="dropdown-item {{ $action->getElementClass(false) }}">{{ $action->getTitle() }}</a>

        @endforeach
    </div>
</div>
@endif
