@if(count($errors) > 0)
    <ul class="mt-2">
        @foreach ($errors->all as $error)
            <li class="alert alert-danger">{{ $error }}</li>
        @endforeach
    </ul>
@endif

@if(session('error'))
    <p class="alert alert-danger">Whoooops!! There seems to be some error.</p>
@endif

@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif