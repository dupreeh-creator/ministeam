<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}">MiniSteam</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @if(Auth::check())
            <ul class="navbar-nav ml-2 mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="#">Magazine
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item ml-2 ">
                    <a class="nav-link"  href="#">News</a>
                </li>
                <li class="nav-item ml-2 ">
                    <a class="nav-link"  href="#">News</a>
                </li>
                <li class="nav-item ml-2  dropdown">
                    <a class="nav-link dropdown-toggle {{Request::is('user/' .Auth::user()->username) ?'active':''}}" data-toggle="dropdown" href="{{route('profile.index',['username'=>Auth::user()->username])}}" role="button"
                       aria-haspopup="true" aria-expanded="false">{{Auth::user()->getNameOrUsername()}}</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item {{Request::is('friends')?'active':''}}" href="{{route('friend.index')}}">Friends</a>
                        <a class="dropdown-item {{Request::is('user/' .Auth::user()->username) ?'active':''}}" href="{{route('profile.index',['username'=>Auth::user()->username])}}">Profile</a>
                        <a class="dropdown-item {{Request::is('profile/edit') ?'active':''}}" href="{{route('profile.edit')}}">Edit profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </li>
                <form methon="GET" action="{{route('search.results')}}" class="form-inline ml-5 my-2 my-lg-0">
                    <input name="query" class="form-control mr-sm-2" type="text" placeholder="What u want?">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </ul>
               @endif
            <ul class="navbar-nav ml-auto">
                @if(Auth::check())
                    <li class="nav-item"> <a href ='{{route('auth.signout')}}' class="nav-link">Exit</a></li>
                @else
                    <li class="nav-item {{Request::is('signup')?'active':''}}"> <a href ='{{route('auth.signup')}}' class="nav-link">Registration</a></li>
                    <li class="nav-item {{Request::is('signin')?'active':''}}"> <a href ='{{route('auth.signin')}}' class="nav-link">Login</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>
