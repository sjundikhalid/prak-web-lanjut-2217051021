@extends('layouts.app')
@section('content')
<a href="/">Back</a>
    <div class="container">
        <div class="formlogin">
            <h1 style="font-size:25px;" class="text-center mb-4">Masukkan Nama, NPM, Kelas</h1>
            <form action="{{ route('user.store') }}" class="forminput" method="post" enctype="multipart/form-data">@csrf
                <!-- <div class="input-group form-floating mb-2"> -->
                <input type="text" class="form-control mb-2" id="nama" placeholder="Nama" name="nama" aria-label="default input example">
                    <!-- <label for="floatingInput">Nama</label> -->
                <!-- </div> -->

                @foreach($errors->get('nama') as $msg)
                <p class="text-danger">{{$msg}}</p>
                @endforeach

                <input type="number" class="form-control mb-2" id="semester" placeholder="Semester" name="semester" aria-label="default input example">
                @foreach($errors->get('semester') as $msg)
                <p class="text-danger">{{$msg}}</p>
                @endforeach

                <div class="input-group mb-2">
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

                <!-- <div class="input-group form-floating mb-2"> -->
                <!-- <input type="text" class="form-control mb-2" id="npm" placeholder="NPM" name="npm" aria-label="default input example"> -->
                    <!-- <label for="floatingInput">NPM</label>
                </div> -->

                <!-- @foreach($errors->get('npm') as $msg)
                <p class="text-danger">error woi</p>
                @endforeach -->

                <div class="input-group mb-2">
                <label class="input-group-text" for="inputGroupSelect01">Fakultas</label>
                    <select class="form-select" id="fakultas" name="fakultas_id">
                        @foreach($fakultas as $fakultasItem)
                        <option value="{{$fakultasItem->id}}">{{$fakultasItem->nama_fakultas}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-2">
                <label class="input-group-text" for="inputGroupSelect01">Jurusan</label>
                    <select class="form-select" id="jurusan" name="jurusan">
                        @foreach($jurusan as $values)
                        <option value="{{$values}}">{{$values}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02" name="foto">
                    <label class="input-group-text" for="inputGroupFile02">Foto</label>
                </div>

                <!-- <div class="">
                    <label for="foto" class="input-group-text">Foto: </label><br>
                    <input type="file" id="foto" name ="foto" class="form-control">
                </div> -->

                <button class="submit-button" type="submit" name="login">CREATE</button>
            </form>
        </div>
    </div>
@endsection
