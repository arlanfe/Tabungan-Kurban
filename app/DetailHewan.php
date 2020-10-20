<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailHewan extends Model
{
    protected $fillable = ['id', 'id_hewan', 'jenis', 'berat', 'harga'];
}
