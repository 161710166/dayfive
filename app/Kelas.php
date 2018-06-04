<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'kelas';
    protected $fillable = ['nama_kelas'];
    	public $timestamps = true;

    	public function absen()
    	{
    		return $this->hasMany('App\Absen','kelas_id');
    	}
}
