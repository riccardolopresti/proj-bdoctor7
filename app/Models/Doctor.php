<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['surname', 'slug','address','image','user_id','image_original_name','phone','health_care','cv_original_name' ,'cv'];

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

    public static function generateSlug($name, $surname){
        $slug = Str::slug($name.'-'.$surname);
        $original_slug = $slug;
        $c = 1;
        $doc_exists = Doctor::where('slug',$slug)->first();
        while($doc_exists){
            $slug = $original_slug . '-' . $c;
            $doc_exists = Doctor::where('slug',$slug)->first();
            $c++;
        }
        return $slug;
    }

}
