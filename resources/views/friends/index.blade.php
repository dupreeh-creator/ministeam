@extends('ministeam')

@section('center')
    <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h4>Friends</h4>
            @if(!$friends->count())
                <p>U don`t have any friends. (ಥ﹏ಥ)</p>
            @else
                @foreach($friends as $user)
                    @include('user.includes.userblock')
                @endforeach
            @endif
        </div>
        <div class="col-lg-6">
            <h4>Request to be friends</h4>
            @if(!$requests->count())
                <p>U don`t have any requests. (￣ρ￣)..zzZZ</p>
            @else
                @foreach($requests as $user)
                    @include('user.includes.mine')
                @endforeach
            @endif
        </div>
    </div>
    </div>

@endsection
