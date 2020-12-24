@extends ('admin.admin')
@section('body')

    <div class="table-responsive">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        <li>{!! print_r($errors->all()) !!}</li>
                    </ul>
                </div>
            @endif
        <form action="/admin/sendCreateGameForm" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Games name"  required>
            </div>
            <div class="form-group">
                <label for="image" >image</label>
                <input type="file" class="" name="image" id="image"required>
            </div>
            <div class="form-group">
                <label for="series" >Series</label>
                <input type="text" class="form-control" name="series" id="series" placeholder="Games series" required>
            </div>
            <div class="form-group">
                <label for="description" >Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="Games description" required>
            </div>
            <div class="form-group">
                <label for="price" >Price</label>
                <input type="text" class="form-control" name="price" id="price" placeholder="Games price" required>
            </div>
            <div class="form-group">
                <label for="category" >Category</label>
                <input type="text" class="form-control" name="category" id="category" placeholder="Games category"  required>
            </div>
            <div class="form-group">
                <label for="rates" >Rates</label>
                <input type="text" class="form-control" name="rates" id="rates" placeholder="Games rates" required>
            </div>
            <div class="form-group">
                <label for="year_id" >Year id</label>
                <input type="text" class="form-control" name="year_id" id="year_id" placeholder="Games year id" required>
            </div>
            <button  type="submit" name="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

@endsection

