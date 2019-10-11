<div class="bp-portlet bp-portlet--mobile">
    @if(isset($title))
    <h3 class="box-title"> {{ $title }}</h3>
    @endif

    @if ( $grid->allowTools() || $grid->allowExport() || $grid->allowCreation() )
    <div class="bp-portlet__head">
        @if ( $grid->allowTools() )
        <div class="bp-portlet__head-toolbar">
            {!! $grid->renderHeaderTools() !!}
        </div>
        @endif

        <div class="bp-portlet__head-toolbar">
            {!! $grid->renderExportButton() !!}
            {!! $grid->renderCreateButton() !!}
        </div>

    </div>
    @endif

    {!! $grid->renderFilter() !!}

    <!-- /.box-header -->
    <div class="table-responsive">
        <table class="table table-hover table-head-noborder table-striped mb-0">
            <thead>
                <tr>
                    @foreach($grid->columns() as $column)
                    <th>{{$column->getLabel()}}{!! $column->sorter() !!}</th>
                    @endforeach
                </tr>
            </thead>

            <tbody>
                @foreach($grid->rows() as $row)
                <tr {!! $row->getRowAttributes() !!}>
                    @foreach($grid->columnNames as $name)
                    <td {!! $row->getColumnAttributes($name) !!}>
                        {!! $row->column($name) !!}
                    </td>
                    @endforeach
                </tr>
                @endforeach
            </tbody>


        </table>

    </div>

    {!! $grid->renderFooter() !!}

        {!! $grid->paginator() !!}
    <!-- /.box-body -->
</div>
