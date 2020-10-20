<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    protected $fillable = ['id_nasabah', 'nominal'];
}
