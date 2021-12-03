<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SearchData extends Controller
{
    function SearchAlumni()
    {
        // function for get a spesific alumni data, used in search alumni page menu
        $nim = $_POST["nim"];
        $data = DB::table('data_alumni')->join('prodi', 'data_alumni.kode_prodi', '=', 'prodi.id')
            ->select('nim', 'no_ijasah', 'data_alumni.nama as nama', 'prodi.nama as prodi', 'fakultas', 'tanggal_lulus', 'histori')->where('nim', $nim)->first();
        return view('data_alumni', compact('data'));
    }
    function GetAllAlumni()
    {
        // function for get all alumni data, for admin dasboard and prodi dashboard
        session_start();
        $level = $_SESSION['level'];
        $data = DB::table('data_alumni')->join('prodi', 'data_alumni.kode_prodi', '=', 'prodi.id')
            ->select(
                'nim',
                'no_ijasah',
                'data_alumni.nama as nama',
                'prodi.nama as prodi',
                'fakultas',
                'tanggal_lulus',
                'histori'
            )->get();
        // checking if the user who is logged in is an admin or prodi level
        if ($level = "admin") {
            // return to admin dashboard if true
            return view('admin_data', compact('data'));
        } else {
            // return to prodi dashboard if false
            return view('data_alumni', compact('data'));
        }
    }
    function GetAllProdi()
    {
        // function for get all alumni data, for prodi dasboard only
        session_start();
        $id = $_SESSION['prodi'];
        $data = DB::table('data_alumni')->join('prodi', 'data_alumni.kode_prodi', '=', 'prodi.id')
            ->select(
                'nim',
                'no_ijasah',
                'data_alumni.nama as nama',
                'prodi.nama as prodi',
                'fakultas',
                'tanggal_lulus',
                'histori'
            )->where('kode_prodi', $id)->get();
        return view('prodi_data', compact('data'));
    }
    function GetProdi()
    {
        // function for get specific user prodi data, for prodi dashboard
        session_start();
        $username = $_SESSION['username'];
        $data = DB::table('user_prodi')->join('prodi', 'user_prodi.kode_prodi', '=', 'prodi.id')
            ->select('user_prodi.id', 'username', 'password', 'email', 'prodi.nama as prodi')
            ->where('username', $username)->first();
        // return to prodi dashboard
        return view('prodi', compact('data'));
    }
    function SearchProdiData()
    {
        // function for searching data alumni with some filtering, in admin dashboard and prodi dashboard
        session_start();
        $filter = $_POST['filter'];
        $keywords = $_POST['search'];
        $username = $_SESSION['username'];
        // checking if there is a filter using name
        if($filter=="nama"){
            // adding some text in front of it, because there's a coloumn in other table 
            // that have similar name that make ambiguous
            $filter = "data_alumni.".$filter;
        }
        // checking if this is request from prodi dashboard or not
        if (isset($_SESSION["prodi"])) {
            // implementing query that only return the data that have similar prodi to the user
            $prodi = $_SESSION['prodi'];
            $data = DB::table('data_alumni')->join('prodi', 'data_alumni.kode_prodi', '=', 'prodi.id')
                ->select('nim', 'no_ijasah', 'data_alumni.nama as nama', 'prodi.nama as prodi', 'fakultas', 'tanggal_lulus', 'histori')
                ->where($filter, 'like', "%" . $keywords . "%")->where('kode_prodi', $prodi)->get();
        } else {
            // implementing query that returning all data no matter what prodi it is
            $data = DB::table('data_alumni')->join('prodi', 'data_alumni.kode_prodi', '=', 'prodi.id')
                ->select('nim', 'no_ijasah', 'data_alumni.nama as nama', 'prodi.nama as prodi', 'fakultas', 'tanggal_lulus', 'histori')
                ->where($filter, 'like', "%" . $keywords . "%")->get();
        }
        // checking if it's a request from admin or prodi dashboard
        if ($_SESSION['level'] == "admin") {
            // return to admin dashboard
            return view('admin_data', compact('data'));
        } else if ($_SESSION['level'] == "prodi") {
            // return to prodi dashboard
            return view('prodi_data', compact('data'));
        } else {
            // send back to home because session is expired or there's no session created
            return redirect("/logout");
        }
    }
    function GetAdmin()
    {
        // function that get specific admin data to be displayed in admin profile
        session_start();
        $username = $_SESSION['username'];
        $data = DB::table('user_admin')
            ->select('*')
            ->where('username', $username)->first();
        // return to admin profile page
        return view('admin', compact('data'));
    }
}
