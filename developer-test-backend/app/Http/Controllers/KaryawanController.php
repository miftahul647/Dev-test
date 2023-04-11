<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KaryawanController extends Controller
{

    public function index()
    {
        return response()->json([
            'karyawan' => Karyawan::all(),
            'error' => null
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $valid = Validator::make($data,[
            'nama' => 'required',
            'nip' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_handphone' => 'required',
            'email' => 'required',
        ]);

        if($valid->fails()) return response()->json([
            'karyawan' => null,
            'error' => $valid->errors()
        ]);

        $karyawan = Karyawan::create($data);
        return response()->json([
            'karyawan' => $karyawan,
            'error' => null
        ]);
    }

    public function show($id)
    {
        $karyawan = Karyawan::find($id);
        if($karyawan == null) return response()->json([
            'karyawan' => null,
            'error' => 'karyawan dengan id '.$id.' tidak ditemukan!'
        ]);
        return response()->json([
            'karyawan' => $karyawan,
            'error' => null
        ]);
    }

    public function update(Request $request, $id)
    {
        $karyawan = Karyawan::find($id);
        if($karyawan == null) return response()->json([
            'karyawan' => null,
            'error' => 'karyawan dengan id '.$id.' tidak ditemukan!'
        ]);

        $data = $request->all();
        $valid = Validator::make($data,[
            'nama' => 'required',
            'nip' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'umur' => 'required',
            'alamat' => 'required',
            'agama' => 'required',
            'jenis_kelamin' => 'required',
            'nomor_handphone' => 'required',
            'email' => 'required',
        ]);

        if($valid->fails()) return response()->json([
            'karyawan' => null,
            'error' => $valid->errors()
        ]);

        Karyawan::where('id', $id)->update($data);
        Karyawan::where('id', $id)->update(['created_at' => Carbon::now()]);

        return response()->json([
            'karyawan' => Karyawan::where('id', $id)->get(),
            'error' => null
        ]);
    }

    public function searchQuery($query){
        $karyawan = Karyawan::where('nama','like','%'.$query.'%')
            ->orWhere('nip','like','%'.$query.'%')
            ->orWhere('tempat_lahir','like','%'.$query.'%')
            ->orWhere('tanggal_lahir','like','%'.$query.'%')
            ->orWhere('umur','like','%'.$query.'%')
            ->orWhere('alamat','like','%'.$query.'%')
            ->orWhere('agama','like','%'.$query.'%')
            ->orWhere('jenis_kelamin','like','%'.$query.'%')
            ->orWhere('nomor_handphone','like','%'.$query.'%')
            ->orWhere('email','like','%'.$query.'%')
            ->get();
        return response()->json([
            'karyawan' => $karyawan,
            'error' => null
        ]);
    }

    public function destroy($id)
    {
        $karyawan = Karyawan::find($id);
        if($karyawan == null) return response()->json([
            'karyawan' => null,
            'error' => 'karyawan dengan id '.$id.' tidak ditemukan!'
        ]);

        Karyawan::where('id', $id)->update(['deleted_at' => Carbon::now()]);

        return response()->json([
            'karyawan' => null,
            'error' => null
        ]);
    }

    public function recover($id)
    {
        $karyawan = Karyawan::find($id);
        if($karyawan == null) return response()->json([
            'karyawan' => null,
            'error' => 'karyawan dengan id '.$id.' tidak ditemukan!'
        ]);

        Karyawan::where('id', $id)->update(['deleted_at' => null]);

        return response()->json([
            'karyawan' => null,
            'error' => null
        ]);
    }

}
