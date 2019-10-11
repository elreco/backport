<div class="bp-portlet__foot">

    {{ csrf_field() }}

    <div class="bp-form__actions bp-form__actions--right">

        @if(in_array('reset', $buttons))
            <div class="btn-group pull-left">
                <button type="reset" class="btn btn-warning">{{ trans('admin.reset') }}</button>
            </div>
        @endif




        @if(in_array('submit', $buttons))
        @if(in_array('continue_editing', $checkboxes))
        <label class="bp-radio bp-margin-r-10 bp-padding-l-25">
            <input type="radio" name="after-save" value="1"> {{ trans('admin.continue_editing') }}
            <span></span>
        </label>
        @endif

        @if(in_array('continue_creating', $checkboxes))
            <label class="bp-radio bp-margin-r-10 bp-padding-l-25">
                <input type="radio" name="after-save" value="2"> {{ trans('admin.continue_creating') }}
                <span></span>
            </label>
        @endif

        @if(in_array('view', $checkboxes))
        <label class="bp-radio bp-margin-r-10 bp-padding-l-25">
            <input type="radio" name="after-save" value="3"> {{ trans('admin.view') }}
            <span></span>
        </label>
        @endif

        <div class="btn-group">
            <button type="submit" class="btn btn-brand"><i class="la la-check"></i> {{ trans('admin.save') }}</button>
        </div>


        @endif
    </div>
</div>
