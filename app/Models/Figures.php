<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Figures extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['categories_id','name','price','image'];

    public function Categories(){
        return $this->belongsTo(Categories::class);
    }
}
