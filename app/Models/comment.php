<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillblr = [
        'user_id',
        'artikel_id',
        'body'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function artikel(){
        return $this->belongsTo(artikel::class, 'artikel_id');
    }
}
