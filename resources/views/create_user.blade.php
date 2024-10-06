@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="formlogin">
            <h1 style="font-size:25px;" class="text-center mb-4">Masukkan Nama, NPM, Kelas</h1>
            <form action="{{ route('user.store') }}" class="forminput" method="post">@csrf
                <div class="form-floating mb-4">
                    <input type="text" class="form-control" id="nama" placeholder="name@example.com" name="nama">
                    <label for="floatingInput">Nama</label>
                </div>

                @foreach($errors->get('nama') as $msg)
                <p class="text-danger">{{$msg}}</p>
                @endforeach

                <div class="input-group mb-4">
                <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
                    <select class="form-select" id="kelas_id" name="kelas_id">
                        @foreach($kelas as $kelasItem)
                        <option value="{{$kelasItem->id}}">{{$kelasItem->nama_kelas}}</option>
                        @endforeach
                    </select>
                </div>

                @foreach($errors->get('kelas') as $msg)
                <p class="text-danger">{{$msg}}</p>
                @endforeach

                <div class="form-floating m-1">
                    <input type="text" class="form-control" id="npm" placeholder="npm@example.com" name="npm">
                    <label for="floatingInput">NPM</label>
                </div>

                @foreach($errors->get('npm') as $msg)
                <p class="text-danger">error woi</p>
                @endforeach

                <button type="submit" name="login">CREATE</button>
            </form>
        </div>
    </div>
@endsection
