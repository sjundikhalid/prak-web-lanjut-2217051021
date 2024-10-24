<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table='user';
    protected $guarded=['id'];
    protected $fillable = [
        'nama',
        'semester',
        //'npm',
        'kelas_id',
        'fakultas_id',
        'jurusan',
        'foto', //kolom foto ditambahkan di sini
    ];
    public function kelas(){
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
    public function fakultas(){
        return $this->belongsTo(Fakultas::class, 'fakultas_id');
    }
    public function getUser($id = null) {
        if($id != null) {
            return $this->leftjoin('kelas', 'kelas.id', '=', 'user.kelas_id')
                ->leftjoin('fakultas', 'fakultas.id', '=', 'user.fakultas_id')
                ->select('user.*', 'kelas.nama_kelas', 'fakultas.nama_fakultas')
                ->where('user.id', $id)
                ->first();
        }

        return $this->leftjoin('kelas', 'kelas.id', '=', 'user.kelas_id')->leftjoin('fakultas', 'fakultas.id', '=', 'user.fakultas_id')->select('user.*', 'kelas.nama_kelas as nama_kelas', 'fakultas.nama_fakultas as nama_fakultas')->orderBy('user.id', 'asc')->get();
    }
}
