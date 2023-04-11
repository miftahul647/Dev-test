<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KaryawanRouteController extends Controller
{
    public function index()
    {
        $url = 'http://127.0.0.1:8080/karyawan';
        $client = new Client();
        $response = $client->get($url, [
            'headers' => [
                'Accept' => 'application/json'
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        $karyawan = $data['karyawan'];
        return view('dashboard', ['karyawan' => $karyawan]);
    }

    public function create()
    {
        return view('insert');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $valid = Validator::make($data,[
            'nama' => 'required',
            'nip' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_handphone' => 'required',
            'email' => 'required',
        ]);

        if($valid->fails()) return redirect()->back()->withErrors($valid->errors());

        $birthDate = Carbon::parse($data['tanggal_lahir']); // Replace with your actual birth date
        $currentDate = Carbon::now();
        $dateDifference = $birthDate->diff($currentDate);
        $age = $dateDifference->y;

        $url = 'http://127.0.0.1:8080/karyawan';
        $client = new Client();

        $response = $client->put($url, [
            'json' => [
                'nama' => $data['nama'],
                'nip' => $data['nip'],
                'tempat_lahir' => $data['tempat_lahir'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'umur' => $age,
                'alamat' => $data['alamat'],
                'agama' => $data['agama'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'nomor_handphone' => $data['nomor_handphone'],
                'email' => $data['email'],
            ]
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return redirect()->intended(route('user.dashboard'));
    }

    public function show($id)
    {
        $url = 'http://127.0.0.1:8080/karyawan/'.$id;
        $client = new Client();
        $response = $client->get($url, [
            'headers' => [
                'Accept' => 'application/json'
            ],
        ]);
        $data = json_decode($response->getBody(), true);
        $karyawan = $data['karyawan'];
        return view('update', ['karyawan' => $karyawan]);
    }

    public function recover($id)
    {
        $url = 'http://127.0.0.1:8080/karyawan/recover-karyawan/'.$id;
        $client = new Client();
        $response = $client->get($url, [
            'headers' => [
                'Accept' => 'application/json'
            ],
        ]);
        $data = json_decode($response->getBody(), true);
        $karyawan = $data['karyawan'];
        return redirect()->intended(route("user.dashboard"));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        $valid = Validator::make($data,[
            'nama' => 'required',
            'nip' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_handphone' => 'required',
            'email' => 'required',
        ]);

        if($valid->fails()) return redirect()->back()->withErrors($valid->errors());

        $birthDate = Carbon::parse($data['tanggal_lahir']); // Replace with your actual birth date
        $currentDate = Carbon::now();
        $dateDifference = $birthDate->diff($currentDate);
        $age = $dateDifference->y;

        $url = 'http://127.0.0.1:8080/karyawan/'.$id;
        $client = new Client();

        $response = $client->put($url, [
            'json' => [
                'nama' => $data['nama'],
                'nip' => $data['nip'],
                'tempat_lahir' => $data['tempat_lahir'],
                'tanggal_lahir' => $data['tanggal_lahir'],
                'umur' => $age,
                'alamat' => $data['alamat'],
                'agama' => $data['agama'],
                'jenis_kelamin' => $data['jenis_kelamin'],
                'nomor_handphone' => $data['nomor_handphone'],
                'email' => $data['email'],
            ]
        ]);

        $body = $response->getBody();
        $data = json_decode($body, true);
        return redirect()->intended(route('user.dashboard'));
    }

    public function destroy($id)
    {
        $url = 'http://127.0.0.1:8080/karyawan/'.$id;
        $client = new Client();
        $response = $client->delete($url, [
            'headers' => [
                'Accept' => 'application/json'
            ],
        ]);

        $data = json_decode($response->getBody(), true);
        $karyawan = $data['karyawan'];
        return redirect()->back();
    }

    public function searchQuery(Request $req){
        $data = $req->all();
        $valid = Validator::make($data,[
            'search' => 'required',
        ]);

        if($valid->fails()) return redirect()->intended(route('user.dashboard'));

        $url = 'http://127.0.0.1:8080/karyawan/search-query/'.$req->search;
        $client = new Client();
        $response = $client->get($url, [
            'headers' => [
                'Accept' => 'application/json'
            ],
        ]);
        $data = json_decode($response->getBody(), true);
        $karyawan = $data['karyawan'];
        return view('dashboard', ['karyawan' => $karyawan]);
    }
}
