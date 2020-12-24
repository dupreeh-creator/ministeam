@extends('admin.home')
@section('body')

    <tr>
        <th>#id</th>
        <th>Username</th>
        <th>Email</th>
        <th>Admin</th>
{{--        <th>Profile Image</th>--}}
        <th>First_name</th>
        <th>Last name</th>
        <th>Location</th>
        <th>Edit</th>
        <th>Delete</th>



    @foreach($users as $user)

        <tr>
            <td>{{$user['id']}}</td>
            <td>{{$user['username']}}</td>
            <td>{{$user['email']}}</td>
            <td>{{$user['admin']}}</td>
{{--            <td><img src="<?php echo Storage::url('user_profile_images/'.$user['image']);?>" alt="img" width="100" height="100" style="max-height: 220px"> </td>--}}
{{--            <td>${{$game['password']}}</td>--}}
            <td>{{$user['first_name']}}</td>
            <td>{{$user['last_name']}}</td>
            <td>{{$user['location']}}</td>
            <td><a href="{{route('AdminEditUsers',['id'=>$user['id'] ] )}}" class="btn btn-primary"> Edit</a> </td>
{{--            <td><a href="{{route('AdminEditImageProfile',['id'=>$user['id'] ] )}}" class="btn btn-primary"> Edit--}}
{{--                    image </a></td>--}}
            <td><a href="{{route('AdminDeleteUser',['id'=>$user['id'] ] )}}" class="btn btn-warning"> Delete</a> </td>

        </tr>

    @endforeach

@endsection
