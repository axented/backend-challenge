<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

    <a class="navbar-brand" routerLinkActive="active"><i class="fas fa-users"></i> Bloggers</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
        <div class="navbar-nav mr-2">
            <a class="nav-link" href="{{url('blogger/list')}}">
                <i class="fas fa-users"></i> Bloggers</a>
            
            <a class="nav-link" href="{{url('blogger/favorite')}}">
                <i class="fas fa-users"></i> Favorite blogger</a>

            <a class="nav-link" href="{{url('blogger/profile',auth()->user()->id)}}">
                <i class="fas fa-user"></i> My profile</a>

            <a class="nav-link" href="{{url('/')}}">
                <i class="fas fa-sign-out-alt"></i> Sign out</a>

        </div>
        <form class="form-inline my-2 my-lg-0" method="POST" action="{{ url('blogger/search')}}">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn btn-outline-light my-2 my-sm-0" type="submit"> <i class="fas fa-search"></i></button>
            <input type="hidden" name="_token" value="{{csrf_token()}}">
        </form>
    </div>

</nav>