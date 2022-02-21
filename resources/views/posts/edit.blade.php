@extends('layouts.app')

@section('content')
    <main class="mt-3 container" style="width:800px">
        <h3 class="mb-3">Edit Post:</h3>
        <form>
            @csrf
            <form>
                <input type="text" name="post_id" id="post_id" value="{{ $post->id }}" hidden>
                <div class="mb-3">
                    
                  <label for="title" class="form-label">Title:</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content:</label>
                    <textarea name="content" id="content" class="form-control" cols="30" rows="10">{{ $post->content }}</textarea>
                </div>
                <div class="d-flex justify-content-between">
                    <a href="/users" class="btn btn-secondary">Back to Users</a>
                    <button type="button" class="btn btn-primary" id="edit-btn">Update</button>
                </div>
        </form>
    </main>
    <script>
        $(document).ready(function(){
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })

        $('#edit-btn').click(function(e){
            $.ajax({
                url: '{{ url('/update-post/') }}',
                type: 'post',
                dataType: 'json',
                data: {
                    post_id: $('#post_id').val(),
                    title: $('#title').val(),
                    content: $('#content').val()
                },
                success: function(results){
                    swal({
                        title: "Updated Post",
                        text: "Updated a Post!!",
                        icon: 'success',
                    });
                    setTimeout(() => {
                        window.location.href = '/users'
                    }, 2000);
                   
                }
            })
        });
    </script>
@endsection