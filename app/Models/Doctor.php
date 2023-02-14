<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['surname','slug','address','cv','image','phone','health_care'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function specs(){
        return $this->belongsToMany(Spec::class);
    }

    public function offers(){
        return $this->belongsToMany(Offer::class);
    }
}
