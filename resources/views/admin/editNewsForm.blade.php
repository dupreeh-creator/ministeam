@extends ('admin.admin')
@section('body')
    <div class="table-responsive">
        <form action="/admin/updateNews/{{ $announcement->id}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="News title" value="{{$announcement->title}}" required>
            </div>
            <div class="form-group">
                <label for="description" >Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="News description" value="{{$announcement->description}}" required>
            </div>
            <div class="form-group">
                <label for="full_text" >Text</label>
                <input type="text" class="form-control" name="full_text" id="full_text" placeholder="News text" value="{{$announcement->full_text}}" required>
            </div>
            <div class="form-group">
                <label for="category" >Category</label>
                <input type="text" class="form-control" name="category" id="category" placeholder="News category" value="{{$announcement->category}}" required>
            </div>

            <button  type="submit" name="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

@endsection

