<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'string', 'min:3', "max:10"],
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:8', 'max:200'],

        ]);
        $incomingFields['password'] = bcrypt($request->password);
        User::create($incomingFields);

        return "Hello from our controller";
    }
}
