<?php

namespace App\Http\Controllers;

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

    //Clara Clarita Yung - 215150700111051
    public function register(Request $request)
    {
    $nim = $request->nim;
    $nama = $request->nama;
    $angkatan = $request->angkatan;
    $password = Hash::make($request->password);
    $mahasiswa = Mahasiswa::create([
        'nim' => $nim,
        'nama' => $nama,
        'angkatan' => $angkatan,
        'password' => $password
    ]);
    return response()->json([
        'status' => 'Success',
        'message' => 'new user created',
        'data' => [
            'mahasiswa' => $mahasiswa,
        ]
    ],200);
    }
    //end Clara Clarita Yung

    

    //JWT (Clara Clarita Yung - 215150700111051)
    private function base64url_encode(String $data): String
    {
     $base64 = base64_encode($data); // ubah json string menjadi base64
     $base64url = strtr($base64, '+/', '-_'); // ubah char '+' -> '-' dan '/' -> '_'
     return rtrim($base64url, '='); // menghilangkan '=' pada akhir string
     }
    private function sign(String $header, String $payload, String $secret): String
    {
     $signature = hash_hmac('sha256', "{$header}.{$payload}", $secret, true);
     $signature_base64url = $this->base64url_encode($signature);
     return $signature_base64url;
    }
    private function jwt(array $header, array $payload, String $secret): String
    {
     $header_json = json_encode($header);
     $payload_json = json_encode($payload);
     $header_base64url = $this->base64url_encode($header_json);
     $payload_base64url = $this->base64url_encode($payload_json);
     $signature_base64url = $this->sign($header_base64url, $payload_base64url, $secret);
     $jwt = "{$header_base64url}.{$payload_base64url}.{$signature_base64url}";
     return $jwt;
    }
    //end JWT (Clara Clarita Yung)
}
