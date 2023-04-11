@extends('layout')

@section('title','Insert | Karyawan')

@section('content')

<ul class="nav nav-tabs card-header-tabs shadow p-3 mb-5 bg-white rounded" style="padding: .5em 2em; margin-bottom: 2em; background-color: white; overflow-x: hidden">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.dashboard') }}">dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('user.logout') }}">logout</a>
    </li>
</ul>

<style>
    .absolute-center {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
    }
</style>

<body style="width: 100vw; height: 100vh; white; overflow-x: hidden">
    <div class="container">
        <div class="card">
            <div class="card-header">
                Tambahkan Karyawan Baru
            </div>
            <div class="card-body">
                <form action={{Route("user.store")}} method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="" name='nama' placeholder="masukkan nama karyawan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="" name='nip' placeholder="masukkan nip karyawan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="" name='tempat_lahir' placeholder="masukkan tempat lahir karyawan">
                    </div>
                    <div class="form-group">
                        <input type="date" class="form-control" id="tanggal_lahir" name='tanggal_lahir' placeholder="masukkan tanggal lahir karyawan" onchange="trigger()">
                    </div>
                    <div class="form-group">
                        <input type="text" disabled class="form-control" id="usia_karyawan" placeholder="usia karyawan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="" name='alamat' placeholder="masukkan alamat karyawan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="" name='agama' placeholder="masukkan agama karyawan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="" name='jenis_kelamin' placeholder="masukkan jenis kelamin karyawan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="" name='nomor_handphone' placeholder="masukkan nomor hp karyawan">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="" name='email' placeholder="masukkan tanggal email karyawan">
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert" >
                            {{$errors->first()}}
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary">tambahkan</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        function trigger() {
            function getAge(birthdate) {
                const today = new Date();
                const birthDate = new Date(birthdate);
                let age = today.getFullYear() - birthDate.getFullYear();
                const monthDifference = today.getMonth() - birthDate.getMonth();
                if (
                    monthDifference < 0 ||
                    (monthDifference === 0 && today.getDate() < birthDate.getDate())
                ) {
                    age--;
                }
                return age;
            }
            const tanggal_lahir = document.getElementById('tanggal_lahir')
            const usia_karyawan = document.getElementById('usia_karyawan')
            usia_karyawan.value = `${getAge(tanggal_lahir.value)} tahun`
        }
    </script>
</body>


@endsection
