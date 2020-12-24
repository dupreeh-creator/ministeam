@extends ('admin.admin')
@section('body')
<div class="table-responsive">
    <form action="/admin/updateGame/{{$game->id}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Games name" value="{{$game->name}}" required>
        </div>
        <div class="form-group">
            <label for="series" >Series</label>
            <input type="text" class="form-control" name="series" id="series" placeholder="Games series" value="{{$game->series}}" required>
        </div>
        <div class="form-group">
            <label for="description" >Description</label>
            <input type="text" class="form-control" name="description" id="description" placeholder="Games description" value="{{$game->description}}" required>
        </div>
        <div class="form-group">
            <label for="price" >Price</label>
            <input type="text" class="form-control" name="price" id="price" placeholder="Games price" value="{{$game->price}}" required>
        </div>
        <div class="form-group">
            <label for="category" >Category</label>
            <input type="text" class="form-control" name="category" id="category" placeholder="Games category" value="{{$game->category}}" required>
        </div>
        <div class="form-group">
            <label for="rates" >Rates</label>
            <input type="text" class="form-control" name="rates" id="rates" placeholder="Games rates" value="{{$game->rates}}" required>
        </div>
        <button  type="submit" name="submit" class="btn btn-default">Submit</button>
    </form>
</div>

@endsection

