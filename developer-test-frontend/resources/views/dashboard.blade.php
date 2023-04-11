@extends('layout')

@section('title','Home | Karyawan')

@section('content')

<ul class="nav nav-tabs card-header-tabs shadow p-3 mb-5 bg-white rounded" style="padding: .5em 2em; margin-bottom: 2em; background-color: white">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.dashboard') }}">dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.insert') }}">tambahkan karyawan baru</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.logout') }}">logout</a>
    </li>
    <form method="POST" action={{route('user.search')}} class=" input-group px-3 nav-item" style="max-width: 600px; ">
        @csrf
        <div class="form-outline">
            <input type="search" id="form1" class="form-control bg-white h-100 pl-4 mt-0" placeholder="search.." name="search"/>
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>
    </form>
</ul>

<div class="">
    <h1 class="display-7 text-center">Data Karyawan</h1>
    <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col" class="text-center">Nama</th>
            <th scope="col" class="text-center">NIP</th>
            <th scope="col" class="text-center">Tempat, Tanggal Lahir</th>
            <th scope="col" class="text-center">Umur</th>
            <th scope="col" class="text-center">Alamat</th>
            <th scope="col" class="text-center">Agama</th>
            <th scope="col" class="text-center">Jenis Kelamin</th>
            <th scope="col" class="text-center">Nomor Handphone</th>
            <th scope="col" class="text-center">Email</th>
            <th scope="col" class="text-center">Dibuat</th>
            <th scope="col" class="text-center">Diupdate </th>
            <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawan as $k)
                @if($k['deleted_at'] == null)
                    <tr>
                        <td class="text-center" scope="row">{{$k['id']}}</td>
                        <td class="text-center" scope="row">{{$k['nama']}}</td>
                        <td class="text-center" scope="row">{{$k['nip']}}</td>
                        <td class="text-center" scope="row">{{$k['tempat_lahir']}}, {{\Illuminate\Support\Carbon::parse($k['tanggal_lahir'])->format('d F Y')}}</td>
                        <td class="text-center" scope="row">{{$k['umur']}}</td>
                        <td class="text-center" scope="row">{{$k['alamat']}}</td>
                        <td class="text-center" scope="row">{{$k['agama']}}</td>
                        <td class="text-center" scope="row">{{$k['jenis_kelamin']}}</td>
                        <td class="text-center" scope="row">{{$k['nomor_handphone']}}</td>
                        <td class="text-center" scope="row">{{$k['email']}}</td>
                        <td class="text-center" scope="row">{{ \Illuminate\Support\Carbon::parse($k['created_at'])->format('d F Y')}}</td>
                        <td class="text-center" scope="row">{{ \Illuminate\Support\Carbon::parse($k['updated_at'])->format('d F Y')}}</td>
                        <td class="d-grid gap-2" class="text-center" scope="row">
                            <a class="btn btn-primary btn-xs" href="{{ route('user.update',  ['id' => $k['id']]) }}">update</a>
                            <a class="btn btn-danger btn-xs" href="{{ route('user.destroy',  ['id' => $k['id']]) }}">delete</a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

<div class="" style="margin-top: 4em">
    <h1 class="display-7 text-center">Data yang telah dihapus</h1>
    <table class="table table-sm">
        <thead>
            <tr>
            <th scope="col" class="text-center">ID</th>
            <th scope="col" class="text-center">Nama</th>
            <th scope="col" class="text-center">NIP</th>
            <th scope="col" class="text-center">Tempat, Tanggal Lahir</th>
            <th scope="col" class="text-center">Umur</th>
            <th scope="col" class="text-center">Alamat</th>
            <th scope="col" class="text-center">Agama</th>
            <th scope="col" class="text-center">Jenis Kelamin</th>
            <th scope="col" class="text-center">Nomor Handphone</th>
            <th scope="col" class="text-center">Email</th>
            <th scope="col" class="text-center">Dibuat</th>
            <th scope="col" class="text-center">Diupdate </th>
            <th scope="col" class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($karyawan as $k)
                @if($k['deleted_at'] != null)
                    <tr>
                        <td class="text-center">{{$k['id']}}</td>
                        <td class="text-center">{{$k['nama']}}</td>
                        <td class="text-center">{{$k['nip']}}</td>
                        <td class="text-center">{{$k['tempat_lahir']}}, {{\Illuminate\Support\Carbon::parse($k['tanggal_lahir'])->format('d F Y')}}</td>
                        <td class="text-center">{{$k['umur']}}</td>
                        <td class="text-center">{{$k['alamat']}}</td>
                        <td class="text-center">{{$k['agama']}}</td>
                        <td class="text-center">{{$k['jenis_kelamin']}}</td>
                        <td class="text-center">{{$k['nomor_handphone']}}</td>
                        <td class="text-center">{{$k['email']}}</td>
                        <td class="text-center">{{ \Illuminate\Support\Carbon::parse($k['created_at'])->format('d F Y')}}</td>
                        <td class="text-center">{{ \Illuminate\Support\Carbon::parse($k['updated_at'])->format('d F Y')}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('user.recover',  ['id' => $k['id']]) }}">recover</a>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>

@endsection
