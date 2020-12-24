@extends('ministeam')


@section('center')
    <br>
    <link href="css/editprofile.css" rel="stylesheet">
    <div class="container">
        <form method="POST" action="{{route('profile.edit')}}" novalidate>
            @csrf
            <div class="row gutters">

                <div class="col-xl-9 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row gutters">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <h6 class="mb-3 text-primary">Personal Details</h6>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="first_name">First name</label>
                                        <input type="text" class="form-control" id="first_name"
                                               placeholder="Enter first name"
                                               value="{{Request::old('first_name')?:Auth::user()->first_name}}">
                                        @if($errors->has('first_name'))
                                            <span class="help-block text-danger">
                                     {{$errors->first('first_name')}}
                                         </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="last_name">Surname</label>
                                        <input type="text"
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
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label for="location">Your Country</label>
                                        <input type="text" class="form-control" id="location" placeholder="Enter country"
                                               value="{{Request::old('location')?:Auth::user()->location}}">
                                        @if($errors->has('location'))
                                            <span class="help-block text-danger">
                            {{$errors->first('location')}}
                             </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="text-right">

                                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Update </button>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

@endsection
