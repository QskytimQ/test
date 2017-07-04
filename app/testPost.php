<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testPost extends Model
{
    protected $fillable = ["user_id","title","article","image_path"];
    public function user(){
    	return $this->hasOne('App\User',"id","user_id");
    }
    public function messages(){
    	return $this->hasMany('App\message','article_id',"id");
    }
}
