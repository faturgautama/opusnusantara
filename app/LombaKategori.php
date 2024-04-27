<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LombaKategori extends Model
{
    //

    public function lomba()
    {
        return $this->belongsTo('App\Lomba');
    }
}
