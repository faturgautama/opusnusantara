<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lombaku extends Model
{
    // use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    // protected $dates = ['deleted_at'];

    protected static function boot()
    {
        static::creating(function (self $lombaku) {
            $lastTransaction = self::query()->orderByDesc('id')->first();
            $nextTransactionId = !empty($lastTransaction) ? $lastTransaction->id + 1 : 1;
            $lombaku->external_id = 'opus_INV-' . date('Ymd')  . str_pad($nextTransactionId, 5, '0', STR_PAD_LEFT);
        });
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function peserta()
    {
        return $this->hasMany('App\LombakuPeserta');
    }

    public function lomba()
    {
        return $this->belongsTo('App\Lomba');
    }
}
