<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} col-form-label col-form-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">



        <div class="input-group">

            @if ($prepend)
                <div class="input-group-prepend"><span class="input-group-text">{!! $prepend !!}</span></div>
            @endif

            <input {!! $attributes !!} class="form-control {!! !$errors->has($errorKey) ? '' : 'is-invalid' !!}" />

            @if ($append)
                <div class="input-group-append"><span class="input-group-text">{!! $append !!}</span></div>
            @endif

        </div>

        @include('backport::form.error')
        @include('backport::form.help-block')



    </div>
</div>
