<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanan';
    protected $guarded = [];
    public function kamar()
    {

        return $this->belongsTo(kamar::class);
    }
}