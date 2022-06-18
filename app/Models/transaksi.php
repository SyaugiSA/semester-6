<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaksi extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable=[
        'jumlah',
        'bukti',
        'is_verified',
        'user_id',
        'donasi_id'
    ];

    protected $statuses = array(
        0=>'Belum Terverifikasi',
        1=>'Terverifikasip'
    );

    protected $append = [
        'status'
    ];

    public function getStatusAtribute(){
        return $this->statuses($this->is_verified);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function donasi(){
        return $this->belongsTo(donasi::class, 'donasi_id');
    }
}
