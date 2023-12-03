<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show all recipes
    public function index() {
        return view('users.index', [
            'users' => User::latest()->paginate(9)
        ]);
    }

    // Show Register/Create Form
    public function create() {
        return view('users.register');
    }

    // Create New User
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'date_of_birth' => ['required', 'date', 'before_or_equal:' . now()->subYears(18)->format('Y-m-d')],
            'password' => 'required|confirmed|min:6'
        ], [
            'name.required' => 'Privalote įvesti vardą ir pavardę',
            'name.min' => 'Vardas turi būti bent :min simbolių ilgio',
            'email.required' => 'Privalote įvesti elektroninio pašto adresą',
            'email.email' => 'Neteisingas elektroninio pašto adreso formatas',
            'email.unique' => 'Toks elektroninio pašto adresas jau užregistruotas',
            'date_of_birth.required' => 'Privalote įvesti gimimo datą',
            'date_of_birth.date' => 'Neteisingas datos formatas',
            'date_of_birth.before_or_equal' => 'Registruotis gali tik suaugę asmenys',
            'password.required' => 'Privalote įvesti slaptažodį',
            'password.confirmed' => 'Slaptažodžiai nesutampa',
            'password.min' => 'Slaptažodis turi būti bent :min simbolių ilgio',
        ]);

        // Hash Password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create User
        $user = User::create($formFields);

        // Login
        auth()->login($user);

        return redirect('/')->with('message', 'Paskyra sukurta ir prijungta');
    }

    // Logout User
    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Jūs atsijungėte!');

    }

    // Show Login Form
    public function login() {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'Jūs prisijungėte!');
        }

        return back()->withErrors(['email' => 'Neteisingi prisijungimo duomenys'])->onlyInput('email');
    }
}
