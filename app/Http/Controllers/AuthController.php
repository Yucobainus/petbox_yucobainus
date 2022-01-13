<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Cookie\CookieJar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Cookie as HttpFoundationCookie;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->only('logout');
    }

    public function register(Request $request)
    {
        // $this->validate($request, [
        //     'name' => 'required|max:255',
        //     'email' => 'required|email|unqiue:users',
        //     'password' => 'required|between:6,25|confirm'
        // ]);
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        return response()->json([
            'success' => true
        ]);
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'password' => 'required|between:6,25'
        ]);

        $user = User::where('name', $request->name)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session_start();
            $_SESSION['authorized'] = true;
            return response()->json([
                'answer' => $_SESSION,
                'errors' => false
            ]);
        }

        return response()->json([
            'answer' => false,
            'errors' => 'Пароль или Логин не верные'
        ]);
    }

    public function auth()
    {
        session_start();
        if (isset($_SESSION['authorized'])) {
            return response()->json([
                'authorized' => $_SESSION['authorized']
            ]);
        }
        return response()->json([
            'authorized' => false
        ]);
    }

    public function out()
    {
        session_start();
        unset($_SESSION['authorized']);
        return response()->json([
            'success' => true
        ]);
    }
}
