@extends('layouts.app')

@section('content')
    <main class="container">
        <h1>List of Users:</h1>
        <div class="d-flex">
                @if (isset($users))
                @foreach ($users as $user)
                    <div class="card mt-3 ms-3" style="width: 25rem;">
                        <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text"><small class="text-muted">{{ $user->email }}</small></p>
                        <p class="card-text">{{ $user->description }}</p>
                        <div class="mb-3 d-flex justify-content-between">
                            <a href="{{ url('posts/show/'.$user->id)}}" class="btn btn-primary" style="width: 150px">See User's Posts</a>
                            <a href="{{ route('file')}}" class="btn btn-warning" style="width: 150px">Upload a File</a>
                        </div>
                        
                        </div>
                    </div>
                @endforeach
            @else
                <h5>No users yet...</h5>
            @endif
        </div>  
    </main>
    <script>
      
@endsection