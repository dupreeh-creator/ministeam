@extends('ministeam')
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
@section('center')
    <br>
    <div class="container">

        <h1>Edit Profile</h1>
        <hr>
        <div class="row">
            <!-- left column -->
            <div class="col-md-3">
                <div class="text-center">
                    <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                    <h6>Upload a different photo...</h6>

                    <input type="file" class="form-control">
                </div>
            </div>

            <!-- edit form column -->
            <div class="col-md-9 personal-info">
                {{--                <div class="alert alert-info alert-dismissable">--}}
                {{--                    <a class="panel-close close" data-dismiss="alert">×</a>--}}
                {{--                    <i class="fa fa-coffee"></i>--}}
                {{--                    This is an <strong>.alert</strong>. Use this to show important messages to the user.--}}
                {{--                </div>--}}
                <h3>Personal info</h3>
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="{{route('profile.edit')}}" novalidate>
                            @csrf
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="first_name">First name:</label>
                                <div class="col-lg-8">
                                    <input type="text" name="first_name"
                                           class="form-control {{$errors->has('first_name')? ' is-invalid': ''}}"
                                           id="first_name" placeholder="Enter first name"
                                           value="{{Request::old('first_name')?:Auth::user()->first_name}}">
                                    @if($errors->has('first_name'))
                                        <span class="help-block text-danger">
                                     {{$errors->first('first_name')}}
                                         </span>
                                    @endif
                                </div>
                            </div>
                            <br>


                            <br>
                            <br>
                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="last_name">Last name:</label>
                                <div class="col-lg-8">
                                    <input type="text" name="last_name"
                                           class="form-control {{$errors->has('last_name')? ' is-invalid': ''}}"
                                           id="last_name" placeholder="Enter surname"
                                           value="{{Request::old('last_name')?:Auth::user()->last_name}}">
                                    @if($errors->has('last_name'))
                                        <span class="help-block text-danger">
                                  {{$errors->first('last_name')}}
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <br>


                            <br>
{{--                                                    <div class="form-group">--}}
{{--                                                        <label class="col-lg-3 control-label">Email:</label>--}}
{{--                                                        <div class="col-lg-8">--}}
{{--                                                            <input type="email"--}}
{{--                                                                   class="form-control {{$errors->has('email')? ' is-invalid': ''}}" id="email"--}}
{{--                                                                   placeholder="Enter country"--}}
{{--                                                                   value="{{Request::old('email')?:Auth::user()->email}}">--}}
{{--                                                            @if($errors->has('email'))--}}
{{--                                                                <span class="help-block text-danger">--}}
{{--                                                        {{$errors->first('email')}}--}}
{{--                                                         </span>--}}
{{--                                                            @endif--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

                            <div class="form-group">
                                <label class="col-lg-3 control-label" for="location">Country:</label>
                                <div class="col-lg-8">
                                    <input type="text" name="location"
                                           class="form-control {{$errors->has('location')? ' is-invalid': ''}}"
                                           id="location"
                                           placeholder="Enter country"
                                           value="{{Request::old('location')?:Auth::user()->location}}">
                                    @if($errors->has('location'))
                                        <span class="help-block text-danger">
                            {{$errors->first('location')}}
                             </span>
                                    @endif
                                </div>
                            </div>
                            <br>


                            <br>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="password">Password:</label>
                                <div class="col-md-8">
                                    <input type="password" name="password"
                                           class="form-control  {{$errors->has('password')? ' is-invalid': ''}}"
                                           id="password"
                                           placeholder="Enter password"
                                    >
                                    @if($errors->has('password'))
                                        <span class="help-block text-danger">
                            {{$errors->first('password')}}
                             </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label"></label>
                                <div class="col-md-8">
                                    <button type="submit" id="submit" name="submit"
                                            class="btn btn-primary">Save Changes
                                    </button>
                                    <button type="cancel" id="cancel" name="cancel"
                                            class="btn btn-primary">Cancel
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
        <hr>
    </div>
@endsection
