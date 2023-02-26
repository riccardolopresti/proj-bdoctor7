<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ['offer_type','price','duration'];

    public function doctors(){
        return $this->belongsToMany(Doctor::class)->withPivot('start_at','end_at');
    }
}
