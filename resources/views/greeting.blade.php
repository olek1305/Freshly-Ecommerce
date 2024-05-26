@extends('layouts.master')

@section('content')
    <div>
        <div>
            <a href="{{route('greeting', 'en')}}" class="btn btn-primary">English</a>
            <a href="{{route('greeting', 'pl')}}" class="btn btn-danger">Polish</a>
        </div>
        <div class="display-3">{{__('frontend.welcome')}}</div>
        <p>Localization in laravel</p>

        <div class="row">
            <ul class="row">
                <li>{{__('frontend.home')}}</li>
                <li>{{__('frontend.about')}}</li>
                <li>{{__('frontend.contact')}}</li>
                <li>{{__('frontend.more')}}</li>
            </ul>
        </div>
    </div>
@endsection
