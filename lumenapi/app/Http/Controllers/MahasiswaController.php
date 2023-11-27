<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    //Aulia Septy Anggraini - 215150701111045
    public function getMahasiswa(Request $request)
    {

        $mahasiswa = Mahasiswa::all();

        return response()->json([
            'status' => 'Berhasil',
            'message' => 'Seluruh Data Mata Kuliah Tertampil',
            'mahasiswa' => $mahasiswa

        ], 200);
    }

    public function getMahasiswaByToken(Request $request)
    {

        return response()->json([
            'status' => 'Berhasil',
            'message' => 'Berhasil diambil dari token',
            'mahasiswa' => $request->mahasiswa

        ], 200);
    }
}
    //end (Aulia Septy Anggraini - 215150701111045)