@if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none';">
          <i class="material-icons">close</i>
        </button>
        <span>
          <b>{{ $error }}</b></span>
      </div>
            @endforeach
@endif

@if(session('errorMsg'))
<div class="alert alert-danger">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none';">
    <i class="material-icons">&times;</i>
  </button>
  <span>
    <b>{{ session('errorMsg') }}</b></span>
</div>
@endif


@if(session('successMsg'))
<div class="alert alert-primary" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="this.parentElement.style.display='none';">
    <span aria-hidden="true">&times;</span>
  </button>
  <span>
    <b>{{ session('successMsg') }}</b></span>
</div>
@endif
