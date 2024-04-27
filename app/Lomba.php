<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    //

    public function kategori()
    {
        return $this->hasMany('App\LombaKategori');
    }

    public function lombaku()
    {
        return $this->hasMany('App\Lombaku');
    }
}
