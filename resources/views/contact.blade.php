@extends('layouts.master')

@section('content')
    <div class="row">
        @foreach ($posts as $post)
            <x-post.index>
                <x-slot name="title">
                    {{ $post->title }}
                </x-slot>
                <x-slot name="description">
                    {{ $post->description }}
                </x-slot>
            </x-post.index>
        @endforeach
    </div>
@endsection
