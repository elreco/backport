<div class="bp-portlet">

    <div class="bp-portlet__head">
        <div class="bp-portlet__head-label">
            <h4 class="bp-margin-b-0">{{ $form->title() }}</h4>
        </div>
        <div class="bp-portlet__head-toolbar">
            {!! $form->renderTools() !!}
        </div>
    </div>


    <!-- /.box-header -->
    <!-- form start -->
    {!! $form->open(['class' => "bp-form form-horizontal bp-form--label-right"]) !!}

        <div class="bp-portlet__body">

            @if(!$tabObj->isEmpty())
                @include('backport::form.tab', compact('tabObj'))
            @else
                <div class="fields-group">

                    @if($form->hasRows())
                        @foreach($form->getRows() as $row)
                            {!! $row->render() !!}
                        @endforeach
                    @else
                        @foreach($form->fields() as $field)
                            {!! $field->render() !!}
                        @endforeach
                    @endif


                </div>
            @endif


        </div>
        <!-- /.box-body -->

        {!! $form->renderFooter() !!}

        @foreach($form->getHiddenFields() as $field)
            {!! $field->render() !!}
        @endforeach

        <!-- /.box-footer -->
    {!! $form->close() !!}
</div>
