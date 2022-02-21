@extends('layouts.app')

@section('content')
    <main class="container">
        <div class="d-flex justify-content-end">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPost">
                Create Post
            </button>
        </div>
        @include('inc.messages')
        @if(isset($posts))
            @foreach ($posts as $post)
                <div class="card my-2">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ $post->content }}</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ url('post/edit/'.$post->id) }}" class="btn btn-warning">Edit Post</a>
                            <a href="{{ url('post/delete/'.$post->id) }}" class="btn btn-danger">Delete Post</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <h5>No posts yet...</h5>
        @endif
        <!-- create post Modal -->
        <div class="modal fade" id="createPost" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <form action="{{ route('create-post') }}" method="post">
                @csrf
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="user_id" value="{{ auth()->user()->id }}" hidden>
                            <div class="mb-3">
                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter Title">
                            </div>
                            <div class="mb-3">
                               <textarea name="content" id="content" class="form-control "cols="30" rows="10" placeholder="Enter Content"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="submit-post" class="btn btn-primary">Create Post</button>
                        </div>
                    </div>
                </div>
            </form>
    </main>
@endsection