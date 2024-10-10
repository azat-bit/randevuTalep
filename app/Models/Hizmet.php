<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hizmet extends Model
{
    protected $table = 'hizmetler';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // İlişkiler
    public function randevular()
    {
        return $this->hasMany(Randevu::class, 'hizmet_id');
    }
}