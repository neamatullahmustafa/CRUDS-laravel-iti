<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Symfony\Contracts\Service\Attribute\Required;

class UserController extends Controller
{
    public function listUsers()
    {
        $users = User::withCount('posts')->paginate(3);
        // dd($users );
        return view('users.index', ['users' => $users]);
    }
    public function create()
    {
        return view('users.create');
    }
    public function store(Request $req)
    {
        $req->validate([
            "name" => 'required|unique:users|max:255',
            "email" =>  'required|unique:users|max:255',
        ]);
        User::create([
            "name" => $req->name,
            "email" => $req->email,
        ]);

        return redirect(url('/'));
    }
    public function edit($userId)
    {
        $user = User::findOrFail($userId);
        return view('users.edit', ['user' => $user]);
    }
    public function update($userId,Request $req)  {
        // $req->validate([
        //     "name" => 'required|unique:users|max:255',
        //     "email" =>  'required|unique:users|max:255',
        // ]);
        User::findOrFail($userId)->update([
            "name" => $req->name,
            "email" => $req->email,
        ]);

        return redirect(url('/'));

    }
    public function show($userId)
    {

        $user = User::with('posts')->findOrFail($userId);
        $posts=$user->posts()->paginate(3);
        return view('users.show', ['user' => $user,'posts'=>$posts]);

    }
    public function delete($userId)  {

        User::findOrFail($userId)->delete();

        return redirect(url('/'));

    }
}
