@extends ('admin.admin')
@section('body')
    <div class="table-responsive">
        <form action="/admin/updateUsers/{{$user->id}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="{{$user->username}}" required>
            </div>
            <div class="form-group">
                <label for="email" >Email</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{$user->email}}" required>
            </div>
            <div class="form-group">
                <label for="admin" >Admin</label>
                <input type="text" class="form-control" name="admin" id="admin" placeholder="This is admin" value="{{$user->admin}}" required>
            </div>
            <div class="form-group">
                <label for="first_name" >First name</label>
                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First name" value="{{$user->first_name}}" required>
            </div>
            <div class="form-group">
                <label for="last_name" >Last name</label>
                <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last name" value="{{$user->last_name}}" required>
            </div>
            <div class="form-group">
                <label for="location" >Location</label>
                <input type="text" class="form-control" name="location" id="location" placeholder="User location" value="{{$user->location}}" required>
            </div>
            <button  type="submit" name="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

@endsection

