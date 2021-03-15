@extends('auth.layaout')

@section('title')
  Profile
@endsection

@section('contenido')

    <div class="container mt-5">
        <div class="row">
            <div class="col-7">
                <img src="" class="img-fluid" alt="">
            </div>
            <div class="col-5">
                <h2 class="display-4">Profile</h2>
                <h3>Name: <small class="text-muted"></small></h3>
                <h3>Web site: <small class="text-muted"></small></h3>
                <h3>Email: <small class="text-muted"></small></h3>
            </div>
        </div>
    </div>

    <div class="container">
        <h4 class="text-center">No friends added</h4>
    </div>

    <div class="container mt-5 mb-5">
        <h4 class="text-center">Friends</h4>
    </div>
@endsection