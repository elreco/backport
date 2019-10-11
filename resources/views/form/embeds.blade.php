
<div class="bp-separator bp-separator--border-dashed bp-separator--space-xl"></div>


<div class="bp-section">
	<h3 class="bp-section__title {{$viewClass['label']}}">
        {{ $label }}
        <div class="{{$viewClass['field']}}"></div>
	</h3>
	<div class="bp-section__content embed-{{$column}}"  id="embed-{{$column}}">
        <div class="embed-{{$column}}-forms">

            <div class="embed-{{$column}}-form fields-group">

                @foreach($form->fields() as $field)
                    {!! $field->render() !!}
                @endforeach

            </div>
        </div>
	</div>
</div>
