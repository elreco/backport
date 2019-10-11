<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} col-form-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('backport::form.error')

        @foreach($options as $option => $label)
            @if(!$inline)<div class="radio">@endif
                <label @if($inline)class="radio-inline"@endif>
                    <input type="radio" name="{{$name}}" value="{{$option}}" class="minimal {{$class}}" {{ ($option == old($column, $value)) || ($value === null && in_array($label, $checked)) ?'checked':'' }} {!! $attributes !!} />&nbsp;{{$label}}&nbsp;&nbsp;
                </label>
            @if(!$inline)</div>@endif
        @endforeach

        @include('backport::form.help-block')

    </div>
</div>
