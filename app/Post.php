<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Post extends Model
{

	use softDeletes;
    protected $fillable = ['title','body','user_id'];
    protected $date = ['deleted_at'];

    public function user(){

    	return $this->belongsTo(User::class);
    }

    public function photos(){
    	return $this->morphMany(Photo::class,'imageable');
    }

    public function tags(){

    	return $this->morphToMany(Tag::class,'taggable');
    	//taggable name of table but singular
    }
}
