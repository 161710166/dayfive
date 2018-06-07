<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    protected $table = 'absens';
    protected $fillable = ['siswa_id','keterangan','piket_id'];
    	public $timestamps = true;
}
	
