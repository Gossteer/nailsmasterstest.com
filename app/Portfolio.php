<?php

namespace App;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{

    protected $fillable = [
        'login_instagram',
        'description',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-m-Y H:i');
    }

    public function master()
    {
        return $this->belongsTo('App\Master');
    }
}
