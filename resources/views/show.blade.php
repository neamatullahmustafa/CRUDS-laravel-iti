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

@endsection
