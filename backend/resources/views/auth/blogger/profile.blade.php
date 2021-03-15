@extends('auth.layaout')

@section('title')
  Profile
@endsection

@section('contenido')
<div class="container mt-5">
        <div class="row">
            <div class="col-7">
                <img src="{{$dataUser->picture}}" class="img-fluid" alt="{{$dataUser->name}}">
            </div>
            <div class="col-5">
                <h2 class="display-4">Profile</h2>
                <h3>Name: <small class="text-muted">{{$dataUser->name}}</small></h3>
                <h3>Web site: <small class="text-muted">{{$dataUser->website}}</small></h3>
                <h3>Email: <small class="text-muted">{{$dataUser->email}}</small></h3>
                
            </div>
        </div>
    </div>

    @if(count($dataFriend)==0)
        <div class="container">
            <h4 class="text-center">No friends added</h4>
        </div>
    @else

        <div class="container mt-5 mb-5">
            <h4 class="text-center">Friends</h4>
        </div>

        <div class="container mt-2">
        @foreach($dataFriend as $dataFriend)
            <div class="card mb-3 shadow p-3 mb-5 bg-white rounded">
                <div class="row no-gutters">

                    <div class="col-md-1  align-self-center">
                        <img src="{{$dataFriend->Data->picture}}" class="rounded-circle" alt="$dataFriend->Data->name" style="width: 75px; height: 75px;">
                    </div>

                    <div class="col-md-11">

                        <div class="card-body">
                            <h4>Name: <small class="text-muted">{{$dataFriend->Data->name}}</small></h4>
                            <h4>Web site: <small class="text-muted">{{$dataFriend->Data->website}}</small></h4>
                        </div>

                        <div class="card-body text-right">
                            <a href="{{url('blogger/profile', array('id'=>$dataFriend->Data->id) )}}" class="card-link"><i class="fas fa-eye"></i> Profile</a>
                        </div>

                    </div>

                </div>
            </div>
            @endforeach
        </div>
@endif
@endsection