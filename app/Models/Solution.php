<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solution extends Model
{
    use HasFactory;
    protected $fillable = ['cause', 'solution', 'symptom_id',];

    public function symptom()
    {
        return $this->belongsTo(Symptom::class);
    }
}
