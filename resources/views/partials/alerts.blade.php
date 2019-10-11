@if($error = session()->get('error'))
    <div class="alert alert-danger alert-dismissable fade show" role="alert">
        <div class="alert-icon"><i class="fas fa-exclamation-triangle"></i></div>
        <div class="alert-text">
            <strong>{{ array_get($error->get('title'), 0) }}</strong> {!!  array_get($error->get('message'), 0) !!}
        </div>
        <div class="alert-close">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true"><i class="fa fa-times"></i></span>
			</button>
		</div>
    </div>
@elseif ($errors = session()->get('errors'))
    @if ($errors->hasBag('error'))
      <div class="alert alert-danger alert-dismissable fade show" role="alert">
          <div class="alert-icon"><i class="fas fa-exclamation-triangle"></i></div>
          <div class="alert-text">
              @foreach($errors->getBag("error")->toArray() as $message)
                  <p>{!!  array_get($message, 0) !!}</p>
              @endforeach
          </div>
          <div class="alert-close">
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  			<span aria-hidden="true"><i class="fa fa-times"></i></span>
  			</button>
  		  </div>
      </div>
    @endif
@endif

@if($success = session()->get('success'))
    <div class="alert alert-success alert-dismissable fade show" role="alert">
        <div class="alert-icon"><i class="fas fa-check"></i></div>
        <div class="alert-text">
            <strong>{{ array_get($success->get('title'), 0) }}</strong> {!!  array_get($success->get('message'), 0) !!}
        </div>
        <div class="alert-close">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true"><i class="fa fa-times"></i></span>
          </button>
        </div>
    </div>
@endif

@if($info = session()->get('info'))
    <div class="alert alert-info alert-dismissable fade show" role="alert">
        <div class="alert-icon"><i class="fas fa-info-circle"></i></div>
        <div class="alert-text">
            <strong>{{ array_get($info->get('title'), 0) }}</strong> {!!  array_get($info->get('message'), 0) !!}
        </div>
        <div class="alert-close">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true"><i class="fa fa-times"></i></span>
          </button>
        </div>
    </div>
@endif

@if($warning = session()->get('warning'))
    <div class="alert alert-warning alert-dismissable fade show" role="alert">
        <div class="alert-icon"><i class="fas fa-info-circle"></i></div>
        <div class="alert-text">
            <strong>{{ array_get($warning->get('title'), 0) }}</strong> {!!  array_get($warning->get('message'), 0) !!}
        </div>
        <div class="alert-close">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true"><i class="fa fa-times"></i></span>
          </button>
        </div>
    </div>
@endif
