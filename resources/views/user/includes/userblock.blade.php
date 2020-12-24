@extends('ministeam')

@section('center')
<div class="media mb-3">


<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<header class="site-header"></header>
    <div class="container ">
        <div class="search_box pull-right">
    <form methon="GET" action="{{route('search.results')}}" class="form-inline ml-5 my-2 my-lg-0">
        <input name="query" class="form-control mr-sm-2" type="text" placeholder="Find user">
        <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
    </div>
    </div>
    <br>
<div class="cover-photo">

</div>

<div class="body">
    <section class="left-col user-info">
        <div class="profile-avatar">
            <a href="{{route('profile.index',['username'=>$user->username])}}">
                <img src="{{$user->getAvaUrl()}}" class="mr-3" alt="{{$user->getNameOrUsername()}}">
            </a>
        </div>
        <h1><a href="{{route('profile.index',['username'=>$user->username])}}">{{$user->getNameOrUsername()}}</a></h1>
        <h2></h2>
        <div class="meta">
            <p><i class="fa fa-fw fa-clock-o"></i> {{$user->getCountry()}}</p>
        </div>
    </section>
    <section class="section center-col content">
            @if(Auth::user()->hasFriendRequest($user))
                <p>Waiting {{$user->getFirstNameOrUsername()}} to answer for request.</p>
            @elseif(Auth::user()->hasFriendRequestRec($user))
                <a href="{{route('friend.accept',['username'=>$user->username])}}" class="btn btn-dark my-2">Accept friend</a>
            @elseif(Auth::user()->friendsWith($user))
                <br>
                <p>
                {{$user->getFirstNameOrUsername()}} in ur friend list.
                </p>
            <form action="{{route('friend.delete',['username'=>$user->username])}}" method="post">
            @csrf
                <input type="submit" value="delete from friend list" class="btn btn-dark my-2">
            </form>
            @elseif(Auth::user()->id !== $user->id)
                <a href="{{route('friend.add',['username'=>$user->username])}}" class="btn btn-dark mb-2">Add to friend</a>
            @endif
            <h4>{{$user->getFirstNameOrUsername()}} friends:(ﾉ◕ヮ◕)ﾉ*:･ﾟ✧</h4>
            @if(!$user->friends()->count())
                <p>{{$user->getFirstNameOrUsername()}} don`t have any friends. (ಥ﹏ಥ)</p>
            @else
                @foreach($user->friends() as $user)
                    {{$user->getFirstNameOrUsername()}}
                @endforeach
            @endif
        </div>
        <!-- Wil hyped X-->

    </section>

</div>



</div>
@endsection
