<div class="{{ $expand?'':'collapse' }}" id="{{ $filterID }}">
    <div class="border-bottom bp-shape-bg-color-1">
    <form action="{!! $action !!}" class="bp-form form-horizontal bp-form--label-right" pjax-container method="get">

        <div class="row bp-padding-15">
            @foreach($layout->columns() as $column)
            <div class="col-md-{{ $column->width() }}">
                <div class="box-body">
                    <div class="fields-group">
                        @foreach($column->filters() as $filter)
                            {!! $filter->render() !!}
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- /.box-body -->

        <div class="bp-padding-15 border-top">
            <div class="row">
                <div class="col-md-{{ $layout->columns()->first()->width() }}">
                    <div class="row">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8">
                            <div class="btn-group">
                                <button class="btn btn-primary submit btn-sm"><i
                                            class="fa fa-search"></i>&nbsp;&nbsp;{{ trans('admin.search') }}</button>
                            </div>
                            <div class="btn-group" style="margin-left: 10px;">
                                <a href="{!! $action !!}" class="btn btn-secondary btn-sm"><i
                                            class="fa fa-undo"></i>&nbsp;&nbsp;{{ trans('admin.reset') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
</div>
</div>
