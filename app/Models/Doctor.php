<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['surname','slug','address','cv','image','image_original_name','phone','health_care'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function specs(){
        return $this->belongsToMany(Spec::class);
    }

    public function offers(){
        return $this->belongsToMany(Offer::class)
            ->withPivot('start_at','end_at');
    }

    public function messages(){
        return $this->hasMany(Message::class);
    }

    public function reviews(){
        return $this->hasMany(Review::class);
    }

    public function ratings(){
        return $this->belongsToMany(Rating::class);
    }

}
