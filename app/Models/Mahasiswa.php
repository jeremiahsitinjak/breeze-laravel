<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $guarded = ['id'];

    protected $table = 'mahasiswa';
    protected $fillable = ['nim', 'nama'];
}
