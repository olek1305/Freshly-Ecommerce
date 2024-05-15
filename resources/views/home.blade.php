@extends('layouts.master')

@section('content')
    <main role="main" class="container">
        <img src="{{ asset('public/storage/images/new_image.jpg') }}" alt="">
        <div class="col-md-4 mt-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('upload-file')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Upload</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success mt-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
