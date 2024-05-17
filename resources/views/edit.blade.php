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
                <form action="">
                    <div class="form-group">
                        <label for="" class="form-label">Image</label>
                        <input type="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Category</label>
                        <select name="" id="" class="form-control">
                            <option value="">Test 1</option>
                            <option value="">Test 2</option>
                            <option value="">Test 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="form-label">Description</label>
                        <textarea name="" id="" cols="30" rows="10" type="text" class="form-control"></textarea>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
