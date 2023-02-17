<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function show(User $user)
    {
        return view('user', [
            'profileUser' => $user,
            'activities' => Activity::feed($user)
        ]);
    }
}
