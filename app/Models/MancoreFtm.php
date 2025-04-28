<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MancoreFtm extends Model
{
    use HasFactory;

    // Nama tabel yang digunakan
    protected $table = 'mancore_dummy';

    protected $fillable = [
        'sto',
        'gpon_slot_port',
        'gpon_ip',
        'eakses',
        'oakses',
        'odc',
    ];
}
