<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Piket extends Model
{
    protected $table = 'piket';
    protected $fillable = ['nama_guru_piket','hari'];
    	public $timestamps = true;
    	
    	public function absen()
    	{
    		return $this->hasMany('App\Absen','piket_id');
    	}

}
