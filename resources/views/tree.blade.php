<div class="bp-portlet">

    <div class="bp-portlet__head">

        <div class="bp-portlet__head-toolbar">
            <div class="btn-group">
                <a class="btn btn-secondary btn-sm {{ $id }}-tree-tools" data-action="expand" title="{{ trans('admin.expand') }}" href="javascript:void(0);">
                    <i class="fa fa-plus-circle"></i>&nbsp;{{ trans('admin.expand') }}
                </a>
                <a class="btn btn-secondary btn-sm {{ $id }}-tree-tools" data-action="collapse" title="{{ trans('admin.collapse') }}" href="javascript:void(0);">
                    <i class="fa fa-minus-circle"></i>&nbsp;{{ trans('admin.collapse') }}
                </a>
            </div>

            @if($useRefresh)
            <div class="btn-group ml-1">
                <a class="btn btn-secondary btn-sm {{ $id }}-refresh" title="{{ trans('admin.refresh') }}" href="javascript:void(0);"><i class="fa fa-sync"></i><span class="hidden-xs">&nbsp;{{ trans('admin.refresh') }}</span></a>
            </div>
            @endif

            @if($useSave)
            <div class="btn-group ml-1">
                <a class="btn btn-primary btn-sm {{ $id }}-save" title="{{ trans('admin.save') }}" href="javascript:void(0);"><i class="fa fa-save"></i><span class="hidden-xs">&nbsp;{{ trans('admin.save') }}</span></a>
            </div>
            @endif

            <div class="btn-group">
                {!! $tools !!}
            </div>
        </div>

        <div class="bp-portlet__head-toolbar">
            @if($useCreate)
            <div class="btn-group pull-right">
                <a class="btn btn-success btn-sm" href="{{ $path }}/create"><i class="fa fa-plus"></i><span class="hidden-xs">&nbsp;{{ trans('admin.new') }}</span></a>
            </div>
            @endif
        </div>

    </div>
    <!-- /.box-header -->
    <div class="box-body table-responsive no-padding">
        <div class="dd" id="{{ $id }}">
            <ol class="dd-list">
                @each($branchView, $items, 'branch')
            </ol>
        </div>
    </div>
    <!-- /.box-body -->
</div>
