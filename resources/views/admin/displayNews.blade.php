@extends('admin.home')
@section('body')

    <tr>
        <th>#id</th>
        <th>Title</th>
        <th>Description</th>

        <th>image</th>
        <th>Category</th>
        <th>Edit</th>
        <th>Edit img</th>
        <th>Delete</th>

    @foreach($announcements as $a)
        <tr>
            <td>{{$a['id']}}</td>
            <td>{{$a['title']}}</td>
            <td>{{$a['description']}}</td>

            <td><img src="{{Storage::url('game_news_images/'.$a['image'])}}" alt="img" width="100" height="100" style="max-height: 290px"> </td>
            <td>{{$a['category']}}</td>
            <td><a href="{{route('AdminEditNews',['id'=>$a['id'] ] )}}" class="btn btn-primary"> Edit</a> </td>
            <td><a href="{{route('AdminEditNewsImageForm',['id'=>$a['id'] ] )}}" class="btn btn-primary"> Edit image </a> </td>
            <td><a href="{{route('AdminDeleteNews',['id'=>$a['id'] ] )}}" class="btn btn-warning"> Delete</a> </td>

        </tr>

    @endforeach

@endsection
