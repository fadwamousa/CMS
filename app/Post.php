<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class Post extends Model
{

	use softDeletes;
    protected $fillable = ['title','body'];
    protected $date = ['deleted_at'];
}
