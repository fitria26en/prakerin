<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = "kotas";
    protected $fillable = ['id_provinsi', 'kode_kota', 'nama_kota'];
    public $timestamps = true;

    public function provinsi()
    {
        return $this->belongsTo('App\Models\Provinsi','id_provinsi');
    }
    public function Kecamatan(){
        return $this->hasMany('App\Models\Kecamatan','id_kecamatan');
    }
}
