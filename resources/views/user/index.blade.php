@extends('ministeam')

@section('center')
    <br>
    <link href="{{asset('/css/app.css')}}" rel="stylesheet">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 content-main">
                <form method="Post" action="{{route('status.post')}}">
                    @csrf
                    <div class="form-group">
                        <textarea name='status' class="form-control {{$errors->has('status')?'is-invalid':''}}"
                                  placeholder="What is new? {{ Auth::user()->getFirstNameOrUsername() }}" cols="30"
                                  rows="3"></textarea>

                    @if ($errors->has('status'))
                        <span class="invalid-feedback">
                            {{$errors->first('status')}}
                        </span>
                    @endif
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm"> <i class="fas fa-plus">></i>Write</button>

                </form>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5 content-main">
                @if(!$statuses->count())
                    <h3>Nothing new?</h3>
                @else
                    @foreach($statuses as $status)
                        <div class="media">

                            <a class="mr-3" href="{{route('profile.index',['username'=>$status->user->username])}}">
                                <img class="media-object rounded" src="{{$status->user->getAvaUrl()}}"
                                     alt="{{$status->user->getFirstNameOrUsername()}}">
                            </a>
                            <div class="media-body">
                                <h4>
                                   <a href="{{ route('profile.index',['username'=>$status->user->username]) }}"> {{ $status->user->getNameOrUsername()}}</a>
                                </h4>
                                <p>{{$status->body}}</p>
                                <ul class="list-inline">
                                    <li class="list-inline-item">{{$status->created_at->diffForHumans()}}</li>
                                </ul>
                                <hr>
                                @foreach($status->replies as $reply)
                                    <div class="media">

                                        <a class="mr-3" href="{{route('profile.index',['username'=>$reply->user->username])}}">
                                            <img class="media-object rounded" src="{{ $reply->user->getAvaUrl() }}"
                                                 alt="{{ $reply->user->getFirstNameOrUsername() }}">
                                        </a>
                                        <div class="media-body">
                                            <h4>
                                                <a href="{{   route('profile.index',['username'=>$reply->user->username]) }}">{{   $reply->user->getNameOrUsername()   }}</a>
                                            </h4>
                                            <p>{{   $reply->body    }}</p>
                                            <ul class="list-inline">
                                                <li class="list-inline-item">{{$reply->created_at->diffForHumans()}}</li>
                                            </ul>
                                            <hr>
                                        </div>
                                    </div>
                                @endforeach

                                <form method="POST" action="{{route('status.reply',['statusId'=>$status->id])}}" class="mb-4">
                                    @csrf
                                    <div class="form-group">
			            <textarea name="reply-{{$status->id}}" class="form-control{{$errors->has("reply-{$status->id}") ? 'is-invalid':''}}"
                      placeholder="Прокомментировать" rows="3"></textarea>
                                        @if ($errors->has("reply-{$status->id}"))
                                            <div class="invalid-feedback">
                                                {{$errors->first("reply-{$status->id}")}}
                                            </div>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Write</button>
                                </form>

                            </div>
                        </div>
                    @endforeach
                    {{$statuses->links()}}
                @endif

            </div>
        </div>
    </div>


@endsection
{{--<div class="panel">--}}
{{--    <div class="panel-heading">--}}
{{--        <h3 class="panel-title">Activity Feed</h3>--}}
{{--    </div>--}}
{{--    <div class="panel-content panel-activity">--}}
{{--        <form  method="Post" action="{{route('status.post')}}" class="panel-activity__status">--}}
{{--            @csrf--}}
{{--            <div class="form-group">--}}
{{--                            <textarea name='user_activity'--}}
{{--                                      class="form-control {{$errors->has('status')?'is-invalid':''}}"--}}
{{--                                      placeholder="Share what you've been up to... {{ Auth::user()->getFirstNameOrUsername() }}"--}}
{{--                                      cols="30" rows="3"></textarea>--}}
{{--            </div>--}}
{{--            @if ($errors->has('status'))--}}
{{--                <div class="invalid-feedback">--}}
{{--                    {{$errors->first('status')}}--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            <div class="actions">--}}
{{--                <button type="submit" class="btn btn-sm btn-rounded btn-info">--}}
{{--                    Post--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}


{{--    <ul class="panel-activity__list">--}}
{{--        <li>--}}
{{--            <i class="activity__list__icon fa fa-question-circle-o"></i>--}}
{{--            <div class="activity__list__header">--}}
{{--                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt=""/>--}}
{{--                <a href="#">John Doe</a> Posted the question: <a href="#">How can I change my annual reports--}}
{{--                    for the better effect?</a>--}}
{{--            </div>--}}
{{--            <div class="activity__list__body entry-content">--}}
{{--                <p>--}}
{{--                    <strong>Lorem ipsum dolor sit amet</strong>, consectetur adipisicing elit. Voluptatibus--}}
{{--                    ab a nostrum repudiandae dolorem ut quaerat veniam asperiores, rerum voluptatem magni--}}
{{--                    dolores corporis!--}}
{{--                    <em>Molestiae commodi nesciunt a, repudiandae repellendus ea.</em>--}}
{{--                </p>--}}
{{--            </div>--}}
{{--            <div class="activity__list__footer">--}}
{{--                <a href="#"> <i class="fa fa-thumbs-up"></i>123</a>--}}
{{--                <a href="#"> <i class="fa fa-comments"></i>23</a>--}}
{{--                <span> <i class="fa fa-clock"></i>2 hours ago</span>--}}
{{--            </div>--}}
{{--        </li>--}}

{{--    </ul>--}}

