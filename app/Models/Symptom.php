<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Symptom extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id', 'fonctionning_id',];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function fonctionning()
    {
        return $this->belongsTo(Fonctionning::class);
    }
}
