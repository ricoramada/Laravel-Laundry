<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class model_outlet extends Model
{
  protected $table = 'tb_outlet';
  public $timestamps = false;
  protected $fillable = [
    'id',
    'nama_outlet',
    'alamat',
    'tlp'
  ];
  public function transaksi()
  {
    return $this->hasMany('App\model_transaksi');
  }
}
