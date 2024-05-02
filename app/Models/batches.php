<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class batches extends Model
{
    use HasFactory;
    public $table = 'batche';
    public $timestamps = false;
    public function teacher()
    {
        return $this->belongsTo(teachers::class);
        return $this->belongsTo(courses::class);
    }
}
