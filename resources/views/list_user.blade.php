@extends('layouts.app')
@section ('content')
<div class="table-container mb-5">
    <a href="{{ route('users.create') }}" class="btn btn-primary mt-3 mb-3">Tambah Pengguna Baru</a>
    <table class="table table-striped table-bordered m-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Semester</th>
                <th>Kelas</th>
                <!-- <th>NPM</th> -->
                <th>Fakultas</th>
                <th>Jurusan</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) :
            ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['nama'] ?></td>
                    <td><?= $user['semester'] ?></td>
                    <td><?= $user['nama_kelas'] ?></td>
                    <td><?= $user['nama_fakultas'] ?></td>
                    <td><?= $user['jurusan'] ?></td>
                    <td><img src="{{ asset('storage/uploads/' . $user->foto) }}" width="100" alt=""></td>
                    <td><a href="{{route('users.show', $user->id)}}" class="btn btn-success btn-sm">Detail</a>
                        <a href="{{route('user.edit', $user['id'])}}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{route('user.destroy', $user['id'])}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"
                            onclick="return confirm('Apakah anda yakin ingin menghapus user ini?')">Delete</button>
                        </form>
                    </td>

                </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
</div>
@endsection
