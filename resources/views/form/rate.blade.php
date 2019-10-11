<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} col-form-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('backport::form.error')

        <div class="input-group" style="width: 150px">
            <input type="text" id="{{$id}}" name="{{$name}}" value="{{ old($column, $value) }}" class="form-control {{$class}}" placeholder="0" style="text-align:right;" {!! $attributes !!} />
            <span class="input-group-addon">%</span>
        </div>

        @include('backport::form.help-block')

    </div>
</div>
