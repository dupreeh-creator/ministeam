@extends('ministeam')

@section('center')
    <div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h3>Results of search:"{{Request::input('query') }}"</h3>
            @if(!$users->count())
                <div class="container">
                <p>User not find.</p>
                </div>
            @else

                <div class="row">
                    <div class="col-lg-6">
                        @foreach($users as $user)

                            @include('user.includes.userblock')
                        @endforeach
                    </div>
                </div>

            @endif
        </div>
    </div>
    </div>
@endsection
