<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembimbing extends Model
{
    use HasFactory;
    protected $table = 'pembimbings';
    protected $primarykey = 'id_pembimbing';
    protected $fillable = [
		'id_pembimbing',
		'nama',
		'username',
		'password',
    ];
}
