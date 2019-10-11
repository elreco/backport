<div class="{{$viewClass['form-group']}}">
    <label class="{{$viewClass['label']}}">{{$label}}</label>
    <div class="{{$viewClass['field']}}">
        <p class="form-control-static">
            {!! $value !!}&nbsp;
        </p>

        @include('backport::form.help-block')

    </div>
</div>
