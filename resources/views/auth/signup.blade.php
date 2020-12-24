@extends('ministeam')

@section('center')
    <br>
    <h3 class="text-center">Registration Page</h3>
    <section id="form">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-1">
                    <div class="login-form">
            <form method="POST" action="{{route('auth.signup')}}" novalidate>
                @csrf
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" name='email' class="form-control{{$errors->has('email')? ' is-invalid' : ''}}"
                           id="email" placeholder="@nofantazy@gmail.com" value="{{Request::old('email')?:''}}">
                    @if($errors->has('email'))
                        <span class="help-block text-danger">
                    {{$errors->first('email')}}
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="username">Login</label>
                    <input type="text" name='username'
                           class="form-control{{$errors->has('username')? ' is-invalid': ''}}" id="username"
                           placeholder="nofantazy" value="{{Request::old('username')?:''}}">
                    @if($errors->has('username'))
                        <span class="help-block text-danger">
                    {{$errors->first('username')}}
                    </span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name='password'
                           class="form-control{{$errors->has('password')? ' is-invalid': ''}}" id="password"
                           placeholder="min 8 characters">
                    @if($errors->has('password'))
                        <span class="help-block text-danger">
                    {{$errors->first('password')}}
                    </span>
                    @endif
                </div>

                {{--                <div class="form-group">--}}
                {{--                    <label for="email">Your Country</label>--}}
                {{--                    <input type="email" name ='email' class="form-control" id="email" placeholder="for examples,@nofantazy@gmail.com" >--}}
                {{--                </div>--}}
                <button type="submit" class="btn btn-primary">Create Account</button>
            </form>
                    </div>

                </div>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-4">
                    <div class="signup-form"><!--sign up form-->
                        <img src="images/home/red.png" alt="red" name=""/>
                    </div><!--/sign up form-->
                </div>
            </div>

        </div>
    </section>

@endsection

