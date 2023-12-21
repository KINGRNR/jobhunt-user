<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;

    protected $table = 'feed_reaction';
    protected $fillable = [
        'id_user',
        'reaction',
        'id_feed',
    ];
    protected $primaryKey = 'id_react';

    public $timestamps = false; // Add this line to disable timestamps

    // Other model code...
}
