@extends('layouts.master')

@section('content')

    <div class="main-content mt-5">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Trashed Posts</h4>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a class="btn btn-success mx-1" href="{{ route('posts.index') }}">Back</a>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col" style="width: 10%">Image</th>
                        <th scope="col" style="width: 20%">Title</th>
                        <th scope="col" style="width: 30%">Description</th>
                        <th scope="col" style="width: 10%">Category</th>
                        <th scope="col" style="width: 10%">Publish Date</th>
                        <th scope="col" style="width: 20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1111111</th>
                        <td>
                            <img src="https://picsum.photos/200" alt="" width="80">
                        </td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                        <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit.</td>
                        <td>News</td>
                        <td>2-5-21</td>
                        <td>
                            <a class="btn btn-sm btn-success" href="">Show</a>
                            <a class="btn btn-sm btn-primary" href="{{ route('posts.edit') }}">Edit</a>
                            <a class="btn btn-sm btn-danger" href="">Delete</a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
