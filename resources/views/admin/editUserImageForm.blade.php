@extends ('admin.admin')
@section('body')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                <li>{!! print_r($errors->all()) !!}</li>
            </ul>
        </div>
    @endif

    <h3>Current image</h3>
    <div><img src="{{asset('storage')}}/games_images/{{$user['image']}}" width="100" height="100" style="max-height: 220px"> </div>
    <form action="/admin/updateUserProfileImage/{{$user->id}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}

        <div class="form-group">
            <label for="image">Update Image</label>
            <input type="file" class="" name="image" id="image" placeholder="Image" value="{{$user['image']}} " required>
        </div>
        <button  type="submit" name="submit" class="btn btn-default">Submit</button>

    </form>
@endsection

