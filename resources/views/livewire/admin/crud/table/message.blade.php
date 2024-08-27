@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session()->has('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
@endif

@if (session()->has('error'))
    <div class="alert alert-danger">{{ session('message') }}</div>
@endif