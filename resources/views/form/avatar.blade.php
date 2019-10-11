<div class="{{$viewClass['form-group']}} {!! !$errors->has($errorKey) ? '' : 'has-error' !!}">

    <label for="{{$id}}" class="{{$viewClass['label']}} col-form-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('backport::form.error')


        <div class="bp-avatar {{$name}}" id="{{$name}}">
            <div class="bp-avatar__holder" style="background-image: url('{{ url($placeholder) }}')"></div>
            <label class="bp-avatar__upload" data-toggle="bp-tooltip" title="" data-original-title="Change avatar">
            	<i class="fa fa-pen"></i>
            	<input type="file" name="{{$name}}" accept=".png, .jpg, .jpeg"  {!! $attributes !!}>
            </label>
            <span class="bp-avatar__cancel" data-toggle="bp-tooltip" title="" data-original-title="Cancel avatar">
            	<i class="fa fa-times"></i>
            </span>
        </div>

        @include('backport::form.help-block')

    </div>

</div>
