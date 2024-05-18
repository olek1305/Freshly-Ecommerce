@extends('layouts.master')

@section('content')

    <div class="main-content mt-3">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Edit Post</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a class="btn btn-success mx-1" href="{{ route('posts.index') }}">Back</a>
                    </div>
                </div>
            </div>
            <div class="card-header">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
                <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div>
                            <img src="{{ asset($post->image) }}" alt="" width="80">
                        </div>
                        <label for="" class="form-label">Image</label>
                        <input name="image" type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Title</label>
                        <input name="title" type="text" class="form-control" value="{{ $post->title }}">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Category</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="" disabled selected>Select</option>
                            @foreach($categories as $category)
                                <option {{ $category->id == $post->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Description</label>
                        <textarea name="description" id="" cols="30" rows="10" type="text" class="form-control">{{ $post->description }}</textarea>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
