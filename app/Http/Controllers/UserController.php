<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();

        return view('user.index', compact('user'));
    }
    
    public function create()
    {
        return view('user.create');
    }

    protected function store()
    {
            User::create([
            'name'      => request('name'),
            'email'     => request('email'),
            'password'  => bcrypt(request('password')),
            'status'    => request('status')
            ]);
        
            return redirect()->route('user.index')->with('info', 'Data berhasil ditambah');
    }

    public function edit(User $User)
    {
        $Users = User::all();

        return view('user.edit', compact('User', 'Users'));

    }

    public function update(User $User)
    {

        $User->update([
            'name'      => request('name'),
            'email'     => request('email'),
            'password'  => bcrypt(request('password')),
            'status'    => request('status')
        ]);

        return redirect()->route('user.index')->with('info', 'Data berhasil diubah');
    }

    public function destroy(User $User)
    {
        $User->delete();

        return redirect()->route('user.index')->withdanger('Data berhasil dihapus');
    }
}
