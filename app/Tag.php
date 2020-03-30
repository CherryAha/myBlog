<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

    protected $fillable=['name'];

    /**
     * @Descripttion:  定义关联 标签表
     * @name:
     * @test:
     * @msg: syt
     * @param {type} null
     * @return: null
     */
    public function articles(){
        return $this->belongsToMany('App\Article','article_tag','tag_id','article_uid');
    }
}
