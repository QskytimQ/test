<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    protected $fillable = ["user_id","article_id","message"];
    public function user(){
    	return $this->hasOne('App\User',"id","user_id");
    }
    public function article(){
    	return $this->hasOne('App\testPost','id','article_id');
    }
}
