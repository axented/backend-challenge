@extends('auth.layaout')

@section('title')
  List Blogger
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
                        <p class="card-text">Web site: </p>
                    </div>
                    <div class="card-footer text-right">                        
                        <a class="btn btn-primary mr-2" href=""><i class="fas fa-eye"></i> Profile</a>
                    </div>
                </div>
                
            </div>            

        </div>
    </div>
</div>
@endsection