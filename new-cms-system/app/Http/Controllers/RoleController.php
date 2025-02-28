<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Role;

class RoleController extends Controller
{
    

    public function index(){

        return view('admin.roles.index', [
            'roles' => Role::all()
        ]);

    }


    public function store(){

        request()->validate([
            'name' => ['required']
        ]);

        Role::create([
            'name'=>Str::ucfirst(request('name')),
            'slug'=>Str::of(Str::lower(request('name')))->slug('-'),
        ]);

        return back();
    }


}
