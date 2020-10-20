<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nasabah extends Model
{
    protected $fillable = ['id', 'id_detail_hewan', 'nama', 'no_tlp', 'alamat'];
}
