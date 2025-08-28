<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class AccessController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('access.index', compact('users'));

    }

}


