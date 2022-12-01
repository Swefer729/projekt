<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(){



        return view(
            'users.index',
            [
                'users' => User::with('roles')->get()
            ]
        );
    }
}
