@extends('ministeam')

@section('center')
    <br>
    <link href="{{asset('/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container">

        <div class="search_box pull-right">
            <form methon="GET" action="{{route('search.results')}}" class="form-inline ml-5 my-2 my-lg-0">
                <input name="query" class="form-control mr-sm-2" type="text" placeholder="Find user">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>

        <div class="col-lg-8">
            <div class="panel profile-cover">
                <div class="profile-cover__img">
                    <a href="{{route('profile.index',['username'=>$user->username])}}">
                        <img src="{{$user->getAvaUrl()}}" class="mr-3" alt="{{$user->getNameOrUsername()}}">
                    </a>
                    <h3 class="h3">{{$user->getFirstNameOrUsername()}}</h3>
                </div>
                <div class="profile-cover__action bg--img" data-overlay="0.3">

                    @if(Auth::user()->hasFriendRequest($user))
                        <p>Waiting {{$user->getFirstNameOrUsername()}} to answer for request.</p>
                    @elseif(Auth::user()->hasFriendRequestRec($user))
                        <button class="btn btn-rounded btn-info">
                            <a href="{{route('friend.accept',['username'=>$user->username])}}"
                               class="btn btn-dark my-2">Accept friend</a><i class="fa fa-plus"></i>
                        </button>

                        <button class="btn btn-rounded btn-info">
                            <form action="{{route('friend.delete',['username'=>$user->username])}}" method="post">
                                @csrf
                                <input type="submit" value="delete from friend list" class="btn btn-dark my-2">
                            </form>
                        </button>
                    @elseif(Auth::user()->id !== $user->id)
                        <button class="btn btn-rounded btn-info">
                            <a href="{{route('friend.add',['username'=>$user->username])}}">Add to friend</a>
                        </button>
                    @endif

                </div>
                <div class="profile-cover__info">
                    <ul class="nav">

                        <h4>{{$user->getFirstNameOrUsername()}} friends:(ﾉ◕ヮ◕)ﾉ*:･ﾟ✧</h4>
                        @if(!$user->friends()->count())
                            <p>No friends yet. (ಥ﹏ಥ)</p>
                        @else
                            @foreach($user->friends() as $user)
                                {{$user->getFirstNameOrUsername()}}
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>

            <hr>


        <div class="panel">
            <div class="panel-heading">
                @if(!$statuses->count())
                    <h3>{{$user->getFirstNameOrUsername() }} new?</h3>
                @else
                    @foreach($statuses as $status)
                        <div class="media">

                            <a class="mr-3" href="{{route('profile.index',['username'=>$status->user->username])}}">
                                <img class="media-object rounded" src="{{$status->user->getAvaUrl()}}"
                                     alt="{{$status->user->getFirstNameOrUsername()}}">
                            </a>

                            <div class="media-body">

                                <h4>
                                    &nbsp;   <a href="{{ route('profile.index',['username'=>$status->user->username]) }}"> {{ $status->user->getNameOrUsername()}}</a>
                                </h4>
                                <p>&nbsp;&nbsp;&nbsp;{{$status->body}}</p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">{{$status->created_at->diffForHumans()}}</li>
                                </ul>
                                <hr>
                                @foreach($status->replies as $reply)
                                    <div class="media">

                                        <a class="mr-3"
                                           href="{{route('profile.index',['username'=>$reply->user->username])}}">
                                            <img class="media-object rounded" src="{{ $reply->user->getAvaUrl() }}"
                                                 alt="{{ $reply->user->getFirstNameOrUsername() }}">
                                        </a>
                                        <div class="media-body">
                                            <h4>
                                                &nbsp;  <a href="{{   route('profile.index',['username'=>$reply->user->username]) }}">{{   $reply->user->getNameOrUsername()   }}</a>
                                            </h4>
                                            <p>&nbsp;&nbsp;&nbsp;{{   $reply->body    }}</p>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">{{$reply->created_at->diffForHumans()}}</li>
                                            </ul>
                                            <hr>
                                        </div>
                                    </div>
                                @endforeach
                                @if($authUserIsFriend || Auth::user()->id===$status->user->id)
                                    <form method="POST" action="{{route('status.reply',['statusId'=>$status->id])}}"
                                          class="mb-4">
                                        @csrf
                                        <div class="form-group">
			            <textarea name="reply-{{$status->id}}"
                                  class="form-control{{$errors->has("reply-{$status->id}") ? 'is-invalid':''}}"
                                  placeholder="Прокомментировать" rows="3"></textarea>
                                            @if ($errors->has("reply-{$status->id}"))
                                                <div class="invalid-feedback">
                                                    {{$errors->first("reply-{$status->id}")}}
                                                </div>
                                            @endif
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Write</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    </div>

@endsection

