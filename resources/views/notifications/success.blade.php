@if(Session::has('with_success'))

<div class="col-md-12 m-0 p-0">
    <div class="alert alert-success alert-dismissible fade show" role="alert">


          {{ Session::get('with_success') }}

        <div>
            <button  type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif

@if(Session::has('with_error'))
<div class="col-md-12 m-0 p-0">
    <div class="alert alert-danger">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ Session::get('with_error') }}
    </div>
</div>
@endif



