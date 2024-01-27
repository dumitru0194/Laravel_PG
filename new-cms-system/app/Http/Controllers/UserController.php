<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{


    public function index(){

        $users = User::all();
        $users = auth()->user()->Paginate(50);

        return view('admin.users.index', ['users' => $users]);
    }

    public function show(User $user){

        return view('admin.users.profile', [
            'user'=>$user,
            'roles' => Role::all()
        ]);

    }


    public function update(User $user){


        $inputs= request()->validate([
            'username' =>  ['required', 'string', 'max:255', 'alpha_dash'],
            'name' =>      ['required', 'string', 'max:255'],
            'email' =>     ['required', 'email', 'string', 'max:255'],
            'avatar' =>    ['file'],
            #'password' => ['min:6', 'max:100', 'confirmed']
        ]);


        if(request('avatar')){
            $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);

        return back();

    }


    public function destroy(User $user){

        $user->delete();

        session()->flash('user-deleted', 'User has been deleted');

        return back();
    }



}
