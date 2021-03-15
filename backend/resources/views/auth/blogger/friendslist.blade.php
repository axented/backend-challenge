@extends('auth.layaout')

@section('title')
  List friends
@endsection

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-12">

            <div class="card-columns mt-5">

                <div class="card">
                    <img src="" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title">Name: </h5>
                        <p class="card-text">Web Site: </p>
                    </div>
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-primary mr-2"><i class="fas fa-eye"></i> Profile</button>
                        <button type="button" class="btn btn-danger mr-2"><i class="fas fa-user-minus"></i> Delete</button>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection