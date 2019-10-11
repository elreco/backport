<div class="form-group row">
    <label class="col-sm-2 col-form-label-sm">{{$label}}</label>
    <div class="col-sm-8">
        <div class="input-daterange input-group input-group-sm" id="kt_datepicker_5">
            <div class="input-group-prepend">
                <span class="input-group-text">
                    <i class="fa fa-calendar"></i>
                </span>
            </div>
            <input type="text" class="form-control" id="{{$id['start']}}" placeholder="{{$label}}" name="{{$name['start']}}" value="{{ request($name['start'], array_get($value, 'start')) }}">
            <div class="input-group-append">
            	<span class="input-group-text"><i class="la la-ellipsis-h"></i></span>
            </div>
            <input type="text" class="form-control" id="{{$id['end']}}" placeholder="{{$label}}" name="{{$name['end']}}" value="{{ request($name['end'], array_get($value, 'end')) }}">
        </div>
    </div>
</div>
