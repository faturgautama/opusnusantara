<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LombakuPeserta extends Model
{

    public function lomba()
    {
        return $this->belongsTo('App\Lomba');
    }

    public function lombaku()
    {
        return $this->belongsTo('App\Lombaku');
    }

    public function kategori()
    {
        return $this->belongsTo('App\LombaKategori');
    }
}
