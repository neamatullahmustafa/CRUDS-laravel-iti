@extends('layouts/main')
@section('title')
    show
@endsection
@section('header')
    <h1 class="text-center">show post</h1>
@endsection
@section('content')
    <div class="card text-center container">
        <div class="card-header">
            <h5 class="card-title">title : {{ $post->title }}</h5>

        </div>
        <div class="card-img">
            <img src="{{ asset('storage/' . $post->img) }}" class="w-100 " alt="">
            <p class="card-title fs-2">caption : {{ $post->caption }}</p>
        </div>
        <div class="card-body">
            <a href="/user/show/{{$post->user_id}}"class="card-link mx-1">user id : {{ $post->user_id }}</a>
            <p class="card-text">body : {{ $post->body }}</p>

        </div>
        <div class="card-footer text-body-secondary">
            created_at : {{ $post->created_at }} </div>
    </div>
@endsection
