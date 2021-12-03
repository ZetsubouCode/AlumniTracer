<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProdiCRUD extends Controller
{
    function UpdateData()
    {
        // function for updating alumni data, but just the history column one
        // get input data from form html and unpackaging it onto some var, then executed update query
        $nim = $_POST['nim'];
        $histori = $_POST['histori'];
        $update_time = date("Y-m-d h:i:s");
        DB::table('data_alumni')
            ->where('nim', $nim)->update(array(
                'histori' => $histori, 'updated_at' => $update_time
            ));
        // return to prodi dashboard
        return redirect('prodi_data');
    }
}
