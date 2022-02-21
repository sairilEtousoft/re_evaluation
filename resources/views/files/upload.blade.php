@extends('layouts.app')

@section('content')
    <main class="mt-3 container" style="width:800px">
        <h3 class="mb-3">Upload a File:</h3>
        <form action="{{ route('file-upload') }}" method="post" enctype="multipart/form-data">
            @csrf
            <form>
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload a File</label>
                    <input class="form-control" name="file" type="file" id="formFile">
                  </div>
                <div class="d-flex justify-content-between">
                    <a href="/users" class="btn btn-secondary">Back to Users</a>
                    <button type="submit" class="btn btn-primary" id="edit-btn">Upload File</button>
                </div>
        </form>
    </main>

@endsection