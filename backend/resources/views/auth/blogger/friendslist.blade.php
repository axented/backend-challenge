@extends('auth.layaout')

@section('title')
  List friends
@endsection

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-12">

            @if(count($dataFriendsBlogger)==0)
                <h1 >Sin Resultados.</h1>
			@else
            <div class="card-columns mt-5">
            @foreach($dataFriendsBlogger as $user)
                <div class="card">
                    <img src="{{$user->Data->picture}}" class="card-img-top" alt="{{$user->Data->name}}">
                    <div class="card-body">
                        <h5 class="card-title">Name: {{$user->Data->name}} </h5>
                        <p class="card-text">Web Site: {{$user->Data->email}}</p>
                    </div>
                    <div class="card-footer text-right">
                        <a class="btn btn-primary mr-2" href="{{url('blogger/profile', array('id'=>$user->Data->id) )}}"><i class="fas fa-eye"></i> Profile</a>
                        <a class="btn btn-danger mr-2" href="{{url('blogger/deleteFriend', array('id'=>$user->Data->id) )}}"><i class="fas fa-eye"></i> Delete</a>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

        </div>
    </div>
</div>
@endsection