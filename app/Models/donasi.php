<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class donasi extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'judul',
        'deskripsi',
        'jumlah',
        'gambar',
        'added_at',
        'ended_at',
        'is_actived'
    ];

    protected $statuses = array(
        0=>'Tidak Aktif',
        1=>'Aktif'
    );

    protected $append = [
        'status'
    ];

    public function getStatusAtribute(){
        return $this->statuses($this->is_actived);
    }

    public function transaksi(){
        return $this->hasMany(transaksi::class);
    }
}
