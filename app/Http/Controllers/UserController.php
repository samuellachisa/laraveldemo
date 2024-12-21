<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Handle the user registration.
     */
    public function register(Request $request)
    {
        // Validate incoming registration data
        $incomingFields = $request->validate([
            'name' => ['required', 'string', 'min:3', Rule::unique('users', 'name')],
            'email' => ['required', 'string', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'string', 'min:8', 'max:200'],  // Added min length validation
        ]);

        // Hash the password before storing it
        $incomingFields['password'] = bcrypt($request->password);

        // Create a new user and log them in
        $user = User::create($incomingFields);
        auth()->login($user);

        // Redirect to the posts page or home
        return redirect('/posts');
    }

    /**
     * Handle the user logout.
     */
    public function logout()
    {
        // Logout the user and invalidate the session
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        // Redirect to the login page
        return redirect('/');
    }

    /**
     * Handle the user login.
     */
    public function login(Request $request)
    {
        // If the user is already authenticated, redirect them to the posts page
        if (auth()->check()) {
            return redirect('/posts');
        }

        // Validate the incoming login data
        $incomingFields = $request->validate([
            'login_name' => 'required|string',
            'login_password' => 'required|string'
        ]);

        // Attempt to log the user in
        if (auth()->attempt([
            'name' => $incomingFields['login_name'],
            'password' => $incomingFields['login_password']
        ])) {
            // Regenerate session after successful login
            $request->session()->regenerate();

            // Redirect to the posts page after successful login
            return redirect('/posts');
        }

        // If login failed, return back with error messages
        return back()->withErrors([
            'login_name' => 'Invalid credentials',
        ])->withInput();  // Keep the previous inputs (e.g., name)
    }
}
