<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    use HasFactory;
    public $table = "student";
    public $timestamps = false;
    public function teacher()
    {
        return $this->belongsTo(teachers::class);
    }
}
