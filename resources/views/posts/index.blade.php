@extends('layouts/main')
@section('title')
list posts
@endsection
@section('header')
<h1 class="text-center">List posts</h1>

@endsection
@section('content')
<div class="container row row-col-3 mx-auto my-4 justify-content-around ">
@foreach ($posts as $post)
<div class="card" style="width: 18rem;">
    <div class="card-img">
        <img src="{{ asset('storage/' . $media->first()->media) }}" class="w-25 " alt="">            <p class="card-title fs-2" >caption : {{$post->caption}}</p>
    </div>
    <div class="card-body">
        <a class="card-title fs-2" href="{{route('posts.show',$post->id)}}">title : {{$post->title}}</a>
      <h6 class="card-subtitle mb-2 text-body-secondary fs-4">body : {{$post->body}}</h6>
      {{-- <p class="card-text fs-6">created_at : {{$post->created_at}}</p></p> --}}
   <div class="d-flex align-items-center">
      <a href="#" class="card-link mx-1">user name: {{$post->user->name}}</a>
   <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary m-1">Edit</a>
        <form action="{{url("/posts/$post->id")}}" method="post">
@csrf
@method("delete")
        <input type="submit" class="btn btn-danger m-1" value="Delete">
</form>
</div>
       {{-- <p class="card-text">published at : {{$post->published_at}}</p> --}}
    </div>
  </div>
@endforeach
<div class="d-flex justify-content-center">  {{$posts->links()}}</div>

@endsection
