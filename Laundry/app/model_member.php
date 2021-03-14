<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class model_member extends Model
{
  protected $table = 'tb_member';
  public $timestamps = false;
  protected $fillable = [
    'id',
    'nama',
    'alamat',
    'jenis_kelamin',
    'tlp'
  ];
  public function transaksi()
  {
    return $this->hasMany('App\model_transaksi');
  }
}
