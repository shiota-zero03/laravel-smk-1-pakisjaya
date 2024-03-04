<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    protected $table = 'prestasis';
    protected $primarykey = 'id_prestasi';
    protected $fillable = [
		'foto_prestasi',
		'tanggal_prestasi',
		'nama_prestasi',
		'keterangan',
    ];
}
