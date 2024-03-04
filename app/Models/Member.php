<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $table = 'members';
    protected $primarykey = 'id_member';
    protected $fillable = [
		'nama',
		'username',
		'email',
		'password',
		'foto_profil',
		'no_identitas',
		'tempat_lahir',
		'tanggal_lahir',
		'jenis_kelamin',
		'no_telepon',
		'alamat',
		'keahlian',
		'status_akun',
		'status_pkl',
		'role',
		'nama_orangtua',
		'no_telepon_orangtua',
		'alamat_orangtua',
		'mulai_pkl',
		'selesai_pkl',
		'pembimbing_sekolah',
		'pembimbing_industri',
		'lokasi_pkl'
    ];
}
