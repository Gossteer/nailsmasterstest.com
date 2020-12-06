<?php

namespace App;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;

class MasterPoint extends Model
{
    protected $fillable = [
        'master_id',
        'name',
        'latitude',
        'longitude',
        'stasus',
        'price',
        'description',
        'image',
        'address'
    ];

    public function master()
    {
        return $this->belongsTo('App\Master');
    }

    public function recordingTime()
    {
        return $this->hasOne('App\RecordingTime');
    }

    // public function masterPortfolio()
    // {
    //     return $this->belongsTo('App\Master')->using('App\Portfolio');
    // }

    public function masterPortfolio()
    {
        return $this->hasOneThrough('App\Portfolio', 'App\Master',
        'portfolio_id', // Foreign key on cars table...
        'id', // Local key on mechanics table...
        'id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('d-m-Y H:i');
    }

    // public function toArray($request)
    // {
    //     return parent::toArray($request);
    // }
}