@extends('auth.layaout')

@section('title')
  List Blogger
@endsection

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-12">

            @if(count($dataBloggers)==0)
                <h1 >Sin Resultados.</h1>
			@else
            <div class="card-columns mt-5">
            @foreach($dataBloggers as $user)
                <div class="card">
                    <img src="{{$user->picture}}" class="card-img-top" alt="{{$user->name}}">
                    <div class="card-body">
                        <h5 class="card-title">Name: {{$user->name}}</h5>
                        <p class="card-text">Web site: {{$user->website}}</p>
                    </div>
                    <div class="card-footer text-right">                        
                        <a class="btn btn-primary mr-2" href="{{url('blogger/profile', array('id'=>$user->id) )}}"><i class="fas fa-eye"></i> Profile</a>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

        </div>
    </div>
</div>
@endsection