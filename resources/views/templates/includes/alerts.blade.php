@if (Session::has('info'))
    <div class="alert alert-dark" role="alert">
        {{Session::get('info')}}
    </div>

@endif

@if (session::has('success'))
    <br>
    <div class="alert alert-info" role="alert">
        {{session('success')}}
    </div>
@endif
