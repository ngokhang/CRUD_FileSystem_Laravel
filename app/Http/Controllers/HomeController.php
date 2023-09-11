<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    //
    public function login()
    {
        return view("login");
    }

    public function loginAPI(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|string',
            'password' => 'required',
        ]);

        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return redirect('/file');
        }
        return view('login');
    }

    public function register(UserRequest $request)
    {
        $user = new User;
        $user->username = $request->input('username');
        $user->password = bcrypt($request->input('password'));
        $user->email = $request->input('email');
        $user->save();
        return redirect('/auth/login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/auth/login');
    }

    // public function API_Login(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'username' => 'required|exists:users,username',
    //         'password' => 'required'
    //     ], [
    //         'username.required' => 'Username khong duoc de trong',
    //         'username.exists' => 'Username khong ton tai',
    //         'password.required' => 'Password khong duoc de trong'
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json([
    //             'status' => false,
    //             'message' => $validator->errors()->first()
    //         ]);
    //     }

    //     if (Auth::attempt(['email' => $request->input('username'), 'password' => $request->input('password')])) {
    //     }
    // }
}
