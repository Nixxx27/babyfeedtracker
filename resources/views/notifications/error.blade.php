@if ($errors->any())
<div class="col-md-12 p-0 m-0">
<ul class="alert alert-danger">
    @if (!\Request::is('login'))
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
   @foreach($errors->all() as $error)
        <li style="margin-left:15px">{{ $error }}</li>
    @endforeach
</ul>
</div>

@endif
