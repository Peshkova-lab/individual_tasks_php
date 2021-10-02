<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    protected $fillable = [
        'number', 'name', 'author', 'author_id'
    ];

    public function authorF() {
        return $this->belongsTo(
            Author::class,
            'author_id',
            'id'
        );
    }
}
