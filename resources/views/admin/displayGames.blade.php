@extends('admin.home')
@section('body')

    <tr>
        <th>#id</th>
        <th>Name</th>
        <th>Image</th>
        <th>Price</th>
        <th>Category</th>
        <th>Rates</th>
        <th>year id</th>
        <th>Edit</th>
        <th>Edit img</th>
        <th>Delete</th>



    @foreach($games as $game)
            <tr>
                <td>{{$game['id']}}</td>
                <td>{{$game['name']}}</td>
                <td><img src="{{ Storage::url('games_images/'.$game['image']) }}" alt="{{asset ('storage')}}/games_images/{{$game['image']}}" width="100" height="100" style="max-height: 220px"> </td>
                <td>${{$game['price']}}</td>
                <td>{{$game['category']}}</td>
                <td>{{$game['rates']}}</td>
                <td>{{$game['year_id']}}</td>
               <td><a href="{{route('AdminEditGames',['id'=>$game['id'] ] )}}" class="btn btn-primary"> Edit</a> </td>
                 <td><a href="{{route('AdminEditImageForm',['id'=>$game['id'] ] )}}" class="btn btn-primary"> Edit image </a> </td>
                <td><a href="{{route('AdminDeleteGame',['id'=>$game['id'] ] )}}" class="btn btn-warning"> Delete</a> </td>

            </tr>

        @endforeach
    @if($games->count>10)
    <div>
    <button  class="btn btn-default">{{$games->links()}}</button>
        <br>
    </div>
    @endif
@endsection
