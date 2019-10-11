<div class="form-group row">
    <label class="col-sm-2">{{ $label }}</label>
    <div class="col-sm-8">
        @if($wrapped)
        <div class="box box-solid box-default no-margin box-show">
            <!-- /.box-header -->
            <div class="box-body">
                <p class="form-control-static">
                @if($escape)
                    {{ $content }}&nbsp;
                @else
                    {!! $content !!}&nbsp;
                @endif
                </p>
            </div><!-- /.box-body -->
        </div>
        @else
            <p class="form-control-static">
                @if($escape)
                    {{ $content }}
                @else
                    {!! $content !!}
                @endif
            </p>
        @endif
    </div>
</div>
