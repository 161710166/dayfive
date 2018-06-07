<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $fillable = ['nis','nama','jk','tanggal_lahir','alamat','kelas_id'];
    	public $timestamps = true;

	public function Kelas(){
	return $this->belongsTo('App\Kelas','kelas_id');
	}

	public function absen()
    {
    	return $this->hasOne('App\Absen','siswa_id');
    }
}