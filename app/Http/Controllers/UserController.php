<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function login(){
        return view('user.login');
    }

    public function loginAuth(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect('dashboard');
        }

        return redirect('/user/login')->with('error', 'Login gagal. Silakan coba lagi.');
    }

    public function register(){
        return view('user.register');
    }

    public function storeRegister(Request $request){
        $value = [
            'name' => $request->name,
            'email' => $request->email,
            'no_tlp' => $request->no_tlp,
            'password' => bcrypt($request->password),
            'group' => 'user',
        ];
        User::create($value);
        return redirect('dashboard');
    }

    public function profile(){

    }

    public function logout(){
        Auth::logout();
        return view('user.login');
    }
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }
    public function create()
    {
        return view('user.create');
    }
    public function store(Request $request)
    {
        $users = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'group' => 'admin',
        ];

        User::create($users);
        return redirect('user');
    }
    public function edit(string $id) {
        $users = User::find($id);
        return view('user.edit', compact('users'));
    }
    public function update(Request $request, string $id)
    {
        $value = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];

        User::where('id', $id)->update($value);
        return redirect('user');
    }
    public function destroy(string $id)
    {
        $user = User::find($id);

        $user->delete();
        return redirect('user');

    }
}
