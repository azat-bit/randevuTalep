<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Musteri extends Model
{
    protected $table = 'musteriler';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // İlişkiler
    public function randevular()
    {
        return $this->hasMany(Randevu::class, 'musteri_id');
    }
}