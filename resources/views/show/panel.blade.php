<div class="bp-portlet box-{{ $style }}">
    <div class="bp-portlet__head">
        <div class="bp-portlet__head-label">
            <h4 class="bp-margin-b-0">{{ $title }}</h4>
        </div>

        <div class="bp-portlet__head-toolbar">
            {!! $tools !!}
        </div>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <div class="bp-portlet__body">
        <div class="bp-form bp-form--label-right">



            <div class="fields-group">

                @foreach($fields as $field)
                    {!! $field->render() !!}
                @endforeach
            </div>

        <!-- /.box-body -->
        </div>
    </div>
</div>
