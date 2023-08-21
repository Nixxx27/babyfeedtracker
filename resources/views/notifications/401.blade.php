@extends('layouts.app')

@section('content')
<div class="container">
    @include('notifications.success')
    @include('notifications.error')
    <div class="row" style="background: white; padding: 10px; border-radius: 10px; text-align: center">
        <div class="col-md-2"></div>
        <div class="col-md-7">
            <img src="{{asset('images/assets/admin/not-allowed.png')}}" style="height: 100px; width: auto; margin-bottom: 20px" alt="">
            <h4 style="align:center"><strong> Ooops! you're not AUTHORIZED to view this page.</strong></h4>
            <p>If you think this is an error. please contact your system administrator.</p>
            <a class="nav-link" href="{{ route('logout') }}"><button class="btn btn-primary btn-md">LOGOUT</button></a>
            
        </div>
    </div>
</div>
@endsection
