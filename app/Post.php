<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    
use SoftDeletes;
    
    //
    public function category(){
        
        return $this->belongsTo('App\Category');
    }
    
    public function tags(){
        
        return $this->belongsToMany('App\Tag');
    }
    
    protected $fillable = [
    'post_title', 'post_body','featured_img','category_id','slug',
    ];
    
    protected $dates = [
        'deleted_at',
    ];
    
    //Accessros
        public function getFeaturedImgAttribute($featured_img){
        
        return asset($featured_img);
    }
    
}
