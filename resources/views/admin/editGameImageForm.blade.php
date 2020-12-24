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
    <div><img src="{{ Storage::url('games_images/'.$game['image']) }}" width="100" height="100" style="max-height: 220px"> </div>
    <form action="/admin/updateImage/{{$game->id}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}

    <div class="form-group">
        <label for="image">Update Image</label>
        <input type="file" class="" name="image" id="image" placeholder="Image" value="{{$game['image']}} " required>
    </div>
        <button  type="submit" name="submit" class="btn btn-default">Submit</button>

    </form>
@endsection

