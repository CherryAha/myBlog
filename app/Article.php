<?php
/*
 * @Descripttion: 
 * @version: 
 * @Author: syt
 * @Create-Date: Do not edit
 * @Update-Date: Do not edit
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
    * 关联到模型的数据表
    * @var string
    */
    protected $table      = 'articles';

    protected $fillable = ['title','content','author','image_list','classify','tag','uid'];

    protected $casts = [
        'tag'=>'json'
    ];

    protected $primaryKey = 'uid';

    /**
     * @Descripttion:  外联author用户信息
     * @name: 
     * @test: 
     * @msg: syt
     * @param {type} null
     * @return: null
     */     
    public function users(Type $var = null)
    {
        return $this->hasOne('App\User', 'id', 'author');
    }


    /**
     * @Descripttion:  定义关联 标签表
     * @name:
     * @test:
     * @msg: syt
     * @param {type} null
     * @return: null
     */
    public function tags(){
        return $this->belongsToMany('App\Tag','article_tag','article_uid','tag_id');
    }

    /**
     * @Descripttion:  文章标签 新增到单独表
     * @name:
     * @test:
     * @msg: syt
     * @param {type} null
     * @return: null
     */
    public function table_tags(Type $var = null)
    {
        return $this->hasOne('App\User', 'id', 'author');
    }

    /**
     * @Descripttion:  文章分类 新增到单独表
     * @name:
     * @test:
     * @msg: syt
     * @param {type} null
     * @return: null
     */
    public function table_classify(Type $var = null)
    {
    }


}
