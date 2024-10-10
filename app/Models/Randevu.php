<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Randevu extends Model
{
    // Varsayılan olarak, model tablonun adını `randevular` olarak kabul eder
    protected $table = 'randevular';

    // Otomatik olarak `id` kolonu anahtar olarak kabul edilir
    protected $primaryKey = 'id';

    // Eğer timestamps kullanmıyorsanız
    public $timestamps = true;

    // Kütüphane kullanımı için düzenlemeler
    protected $fillable = [
        'tarih',
        'saat',
        'musteri_id',
        'hizmet_id',
        'user_id',
        'aciklama'
    ];

    // İlişkiler
    public function musteri()
    {
        return $this->belongsTo(Musteri::class, 'musteri_id');
    }

    public function hizmet()
    {
        return $this->belongsTo(Hizmet::class, 'hizmet_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
