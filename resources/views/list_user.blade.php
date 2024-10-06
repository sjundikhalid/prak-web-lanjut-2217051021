@extends('layouts.app')
@section ('content')
<div class="table-container mt-5">
    <table class="table table-striped table-bordered m-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>NPM</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) {
            ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['nama'] ?></td>
                    <td><?= $user['npm'] ?></td>
                    <td><?= $user['nama_kelas'] ?></td>
                    <td></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>
@endsection
