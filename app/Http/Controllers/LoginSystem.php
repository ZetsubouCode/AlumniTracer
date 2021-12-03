<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class LoginSystem extends Controller
{
    function admin_login()
    {   
        // function for checking admin login information
        session_start();
        $username = $_POST["username"];
        $password = $_POST["password"];
        $data = DB::table('user_admin')->where('username', $username)->where('password', $password)->first();
        // checking the query result, if return none.. then there's no account like that.
        if ($data != null) {
            // Creating session for some data purpose and limiting access, then redirecting to admin dashboard
            $_SESSION["level"] = "admin";
            $_SESSION["username"] = $username;
            return view("admin",compact('data'));
        } else {
            // redirect to login page
            return view("login_admin");
        }
    }
    function prodi_login()
    {   
        // function for checking prodi login information
        session_start();
        $username = $_POST["username"];
        $password = $_POST["password"];
        $prodi = $_POST["prodi"];
        $data = DB::table('user_prodi')->join('prodi', 'user_prodi.kode_prodi', '=', 'prodi.id')
        ->select('user_prodi.id','username','password','email','prodi.nama as prodi')->where('username', $username)->
        where('password', $password)->first();
        // checking the query result, if return none.. then there's no account like that.
        if ($data != null) {
            // Creating session for some data purpose and limiting access, then redirecting to prodi dashboard
            $_SESSION["level"] = "prodi";
            $_SESSION["prodi"] = $prodi;
            $_SESSION["username"] = $username;
            return view("prodi",compact('data'));
        } else {
            // redirect to login page
            $data = DB::table('prodi')->get();
            return view("login_prodi", compact('data'));
        }
    }
    function logout()
    {
        // function for logout. Here the session that already created are gonna destroyed
        session_start();
        session_destroy();
        // redirect to first page (home) of web
        return view("home");
    }
}
