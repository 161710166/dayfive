<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'absens';
    protected $fillable = ['siswa_id','kelas_id','keterangan','piket_id'];
    public $timestamps = true;

	public function Kelas(){
		return $this->belongsTo('App\Kelas','kelas_id');
	}
	public function Siswa(){
	return $this->belongsTo('App\Siswa','siswa_id');
	}
	public function Piket(){
	return $this->belongsTo('App\Piket','piket_id');
	}

}
	
