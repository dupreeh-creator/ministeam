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
        <form action="/admin/sendCreateNewsForm" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="Title" required>
            </div>
            <div class="form-group">
                <label for="description" >Description</label>
                <input type="text" class="form-control" name="description" id="description" placeholder="News description" required>
            </div>
            <div class="form-group">
                <label for="full_text" >Text</label>
                <input type="text" class="form-control" name="full_text" id="full_text" placeholder="News text" required>
            </div>
            <div class="form-group">
                <label for="image" >image</label>
                <input type="file" class="" name="image" id="image"required>
            </div>

            <div class="form-group">
                <label for="category" >Category</label>
                <input type="text" class="form-control" name="category" id="category" placeholder="News category"  required>
            </div>

            <button  type="submit" name="submit" class="btn btn-default">Submit</button>
        </form>
    </div>

@endsection

