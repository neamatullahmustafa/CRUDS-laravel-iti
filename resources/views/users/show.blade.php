@extends('layouts/main')
@section('title')
show
@endsection
@section('header')
<h1 class="text-center">show Users</h1>

@endsection
@section('content')
    <table class="table container">
        <thead>
            <tr>
              <th scope="col">var</th>
              <th scope="col">value</th>
            </tr>
          </thead>
        <tbody>
          <tr>
            <td>Name</td>
            <td>{{$user->name}}</td>
          </tr>
          <tr>
            <td>Email</td>
            <td>{{$user->email}}</td>
          </tr>
          <tr>
            <td>Created at</td>
            <td>{{$user->created_at->format('d m y :  h:i a')}}</td>
          </tr>

        </tbody>
      </table>
      <div class="container row row-col-3 mx-auto my-4 justify-content-around ">
        @foreach ($posts as $post)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <a class="card-title fs-2" href="{{route('posts.show',$post->id)}}">title : {{$post->title}}</a>
              <h6 class="card-subtitle mb-2 text-body-secondary fs-4">body : {{$post->body}}</h6>
              
            </div>
          </div>
        @endforeach
        <div class="d-flex justify-content-center">  {{$posts->links()}}</div>


@endsection
