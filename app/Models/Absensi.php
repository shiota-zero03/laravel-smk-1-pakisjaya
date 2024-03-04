<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensis';
    protected $primarykey = 'id_absen';
    protected $fillable = [
		'id_member',
		'tangal_absen',
		'jam_absen',
		'status_absen',
		'file_absen',
		'laporan_absen',
    ];
};

