<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} col-form-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('backport::form.error')

        <span class="bp-switch bp-switch--icon">
            <label>
                <input type="hidden" class="{{$class}}" name="{{$name}}" class="" value="0" />
                <input class="{{$class}}" type="checkbox" {{ old($column, $value) == '1' ? 'checked' : '' }} {!! $attributes !!} name="{{$name}}" value="1" />
                <span></span>
            </label>
        </span>

        @include('backport::form.help-block')

    </div>
</div>
