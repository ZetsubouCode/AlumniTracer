<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UpdateData extends Controller
{
    function UpdateAdmin(){
        // function for updating admin profile
        // get input data from form html and unpackaging it onto some var, then executed update query
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $nama = $_POST['nama'];
        $update_time = date("Y-m-d h:i:s");
        DB::table('user_admin')->where('id',$id)->update(array('nama_admin'=>$nama,
        'email'=>$email,'username'=>$username,'password'=>$password,'updated_at'=>$update_time));
        // Redirect to admin dashboard
        return redirect('/admin');
    }
    function UpdateProdi(){
        // function for updating prodi profile
        // get input data from form html and unpackaging it onto some var, then executed update query
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $update_time = date("Y-m-d h:i:s");
        DB::table('user_prodi')->where('id',$id)->update(array('email'=>$email,
        'username'=>$username,'password'=>$password,'updated_at'=>$update_time ));
        // Redirect to prodi dashboard
        return redirect('/prodi');
    }
}
