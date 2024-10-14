<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    //
    public $userModel;
    public $kelasModel;
    public function profile($nama='', $kelas='', $npm='')
    {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm
        ];
        return view('profile', $data);
    }

    public function create(){
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];
        return view('create_user', $data);

    }

    public function store(UserRequest $request){
        // Validasi input
        $request->validate([
                'nama' => 'required|string|max:255',
                'npm' => 'required|string|max:255',
                'kelas_id' => 'required|integer',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', //Validasi untuk foto
            ]);
            // Meng-handle upload foto
            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $fotoName = $foto->hashName();
                // Menyimpan file foto di folder 'uploads'
                $fotoPath = $foto->move(('upload/img'), $fotoName);
            } else {
                // Jika tidak ada file yang diupload, set fotoPath menjadi null atau default
                $fotoPath = null;
            }
            // Menyimpan data ke database termasuk path foto
            $this->userModel->create([
                    'nama' => $request->input('nama'),
                    'npm' => $request->input('npm'),
                    'kelas_id' => $request->input('kelas_id'),
                    'foto' => $fotoPath, // Menyimpan path foto
                ]);
                return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');

        // $this->userModel->create([
        //     'nama' => $request->input('nama'),
        //     'npm' => $request->input('npm'),
        //     'kelas_id' => $request->input('kelas_id'),
        //     ]);

        // return redirect()->to('/user');
    }

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index(){
        $data = [
            'title' => 'User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
    }

    public function show($id){
        $user = $this->userModel->getUser($id);
        $data = [
            'title' => 'Profile',
            'user' => $user,
        ];
        return view('profile', $data);
    }

    public function edit($id){
        $user = UserModel::findOrFail($id);
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();
        $title = 'Edit User';
        return view('edit_user', compact('user', 'kelas', 'title'));
    }

    public function update(Request $request, $id){
        $user = UserModel::findOrFail($id);

        $user->nama = $request->nama;
        $user->npm = $request->npm;
        $user->kelas_id = $request->kelas_id;

        if($request->hasFile('foto')){
            $fileName = time().'.'.$request->foto->extension();
            $request->foto->move(public_path('uploads'), $fileName);
            $user->foto = 'uploads/'.$fileName;
        }

        $user->save();
        return redirect()->route('user.list')->with('success', 'User updated successfully');
    }

    public function destroy($id){
        $user = UserModel::findOrFail($id);
        $user->delete();
        return redirect()->to('/user')->with('success', 'User deleted successfully');
    }
}
