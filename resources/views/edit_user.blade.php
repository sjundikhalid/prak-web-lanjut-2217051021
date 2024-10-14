@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="formlogin">
            <h1 style="font-size:25px;" class="text-center mb-4">Masukkan Nama, NPM, Kelas</h1>
            <form action="{{ route('user.update', $user['id']) }}" class="forminput" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!-- <div class="input-group form-floating mb-2"> -->
                <input type="text" class="form-control mb-2" id="nama" placeholder="Nama" name="nama" aria-label="default input example" value="{{old('nama', $user->nama)}}">
                    <!-- <label for="floatingInput">Nama</label> -->
                <!-- </div> -->

                @foreach($errors->get('nama') as $msg)
                <p class="text-danger">{{$msg}}</p>
                @endforeach

                <div class="input-group mb-2">
                <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
                    <select class="form-select" id="kelas_id" name="kelas_id">
                        @foreach($kelas as $kelasItem)
                        <option value="{{$kelasItem->id}}"
                            {{$kelasItem->id==$user->kelas_id ? 'selected': ''}}>
                            {{$kelasItem->nama_kelas}}</option>
                        @endforeach
                    </select>
                </div>

                @foreach($errors->get('kelas') as $msg)
                <p class="text-danger">{{$msg}}</p>
                @endforeach

                <!-- <div class="input-group form-floating mb-2"> -->
                <input type="text" class="form-control mb-2" id="npm" placeholder="NPM" name="npm" aria-label="default input example" value="{{old('nama', $user->npm)}}">

                    <!-- <label for="floatingInput">NPM</label>
                </div> -->

                @foreach($errors->get('npm') as $msg)
                <p class="text-danger">error woi</p>
                @endforeach

                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="inputGroupFile02" name="foto">
                    @if($user->foto)
                    <img src="{{asset($user->foto)}}" alt="User Photo" width="100" class="mt-2">
                    @endif
                    <label class="input-group-text" for="inputGroupFile02">Foto</label>
                </div>

                <!-- <div class="">
                    <label for="foto" class="input-group-text">Foto: </label><br>
                    <input type="file" id="foto" name ="foto" class="form-control">
                </div> -->

                <button type="submit" name="login">EDIT</button>
            </form>
        </div>
    </div>
@endsection
