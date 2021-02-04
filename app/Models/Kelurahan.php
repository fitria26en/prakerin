<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = "kelurahans";
    protected $fillable = ['kode_kelurahan', 'nama_kelurahan', 'id_kecamatan'];
    public $timestamps = true;

    public function Kecamatan()
    {
        return $this->belongsTo('App\Models\Kecamatan','id_kecamatan');
    }
    public function RW()
    {
        return $this->hasMany('App\Models\Kasus','id_rw');
    }
}
