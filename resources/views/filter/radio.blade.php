<div class="input-group input-group-sm">
    @if($inline)<div class="bp-radio-inline bp-margin-t-5">@endif
    @foreach($options as $option => $label)
            <label @if($inline)class="bp-radio bp-padding-l-25"@endif>
                <input type="radio" class="{{$id}}" name="{{$name}}" value="{{$option}}" {{ ((string)$option === request($name, is_null($value) ? '' : $value)) ? 'checked' : '' }} />&nbsp;{{$label}}&nbsp;&nbsp;
                <span></span>
            </label>
    @endforeach
    @if($inline)</div>@endif
</div>
