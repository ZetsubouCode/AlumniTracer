<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminCRUD extends Controller
{
    function ShowData()
    {
        // function for get all user prodi data, for admin dasboard in prodi menu
        $data = DB::table('user_prodi')->join('prodi', 'user_prodi.kode_prodi', '=', 'prodi.id')
            ->select('user_prodi.id as id', 'username', 'password', 'email', 'prodi.nama as prodi')
            ->get();
        return view('admin_prodi', compact('data'));
    }
    function AddData()
    {
        // function for adding a data to the data_alumni table
        // get input data from form html and unpackaging it onto some var, then executed INSERT query
        $nim = $_POST['nim'];
        $ijasah = $_POST['no_ijasah'];
        $nama = $_POST['nama'];
        $lulus = $_POST['tanggal_lulus'];
        $prodi = $_POST['prodi'];

        DB::table('data_alumni')->insert(
            array(
                'nim' => $nim, 'no_ijasah' => $ijasah, 'nama' => $nama,
                'tanggal_lulus' => $lulus, 'kode_prodi' => $prodi
            )
        );
        // redirect to admin dashboard in data menu
        return redirect('admin_data');
    }
    function UpdateData()
    {
        // function for updating alumni data
        // get input data from form html and unpackaging it onto some var, then executed update query
        $nim = $_POST['nim'];
        $ijasah = $_POST['no_ijasah'];
        $nama = $_POST['nama'];
        $lulus = $_POST['tanggal_lulus'];
        $prodi = $_POST['prodi'];
        $update_time = date("Y-m-d h:i:s"); // the time format must be the same as the database design
        DB::table('data_alumni')
            ->where('nim', $nim)->update(array(
                'nim' => $nim, 'no_ijasah' => $ijasah, 'nama' => $nama,
                'tanggal_lulus' => $lulus, 'kode_prodi' => $prodi, 'updated_at' => $update_time
            ));
        // redirect to admin dashboard in data menu
        return redirect('admin_data');
    }
    function AddProdi()
    {
        // function for adding a data to the user_prodi table
        // get input data from form html and unpackaging it onto some var, then executed INSERT query
        $username = $_POST['username'];
        $password = $_POST['password'];
        $prodi =  $_POST['prodi'];
        $email = $_POST['email'];

        DB::table('user_prodi')->insert(
            array('username' => $username, 'password' => $password, 'kode_prodi' => $prodi, 'email' => $email)
        );

        return redirect('admin_prodi');
    }

    function UpdateProdi()
    {
        // function for updating user prodi data
        // get input data from form html and unpackaging it onto some var, then executed update query
        $id = $_POST['id'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $prodi = $_POST['prodi'];
        $update_time = date("Y-m-d h:i:s");
        DB::table('user_prodi')->where('id', $id)->update(array(
            'email' => $email, 'kode_prodi' => $prodi,
            'username' => $username, 'password' => $password, 'updated_at' => $update_time
        ));
        // return to admin dashboard
        return redirect('admin_prodi');
    }
    function DeleteData($nim)
    {
        // function for deleting a alumni data
        $query = DB::table('data_alumni')->where('nim', $nim)->delete();
        // return to admin dashboard
        return redirect('admin_data');
    }
    function DeleteProdi($id)
    {
        // function for deleting a user prodi data
        $query = DB::table('user_prodi')->where('id', $id)->delete();
        // return to admin dashboard
        return redirect('admin_prodi');
    }
}
