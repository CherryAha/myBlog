<?php
/**
 * Created by PhpStorm.
 * User: Time
 * Date: 2020/3/16
 * Time: 13:22
 */

namespace App\Repository;

use App\Article;
use App\Http\Controllers\Common\tags;
use App\Repository\Interfac\ArticleRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\DB;

class ArticleRepository implements ArticleRepositoryInterface
{
    /**
     * @description:获取所有结果
     *
     * @param:分页数目
     */
    public function all($count)
    {
        // TODO: Implement all() method.
        return Article::paginate($count);
    }

    /**
     * @description: 根据主键 获取查询结果
     *
     * @param:分页数目
     */
    public function find($param)
    {
        // TODO: Implement select() method.
        return Article::find($param);
    }

    /**
     * @description: 根据条件 获取查询结果
     *
     * @param:分页数目
     */
    public function select($key,$value,$paginate=6)
    {
       // TODO: Implement select() method.
       return Article::where($key, $value)->with(['tags'])->paginate($paginate);
    }


    /**
     * @description: 获取用户信息
     *
     * @param:分页数目
     */
    public function select_author_info($key,$value)
    {
        // TODO: Implement select() method.
        if(Article::where($key,$value)->first()){
            return Article::where($key,$value)->first()->users;
        }else{
            return User::where('id',$value)->first();
        }
    }

    /**
     * @description:创建数据
     *
     * @auth syt
     * @time 2020/3-15
     */
    public function create($data)
    {
        //article 插入数据
        $id =Article::query()->create($data)->uid;

        //tag  新增数据
        if(array_key_exists('tag',$data))
        {
            $array_tag_id = tags::add($data['tag']);
            //设置关联
            foreach ($array_tag_id as $tag_id){
                $model = Article::find($id);
                $model->tags()->attach($tag_id);
            }
        }
    }


    /**
     * @description:更新数据
     *
     * @key   : 指定键值
     * @value : 指定键值
     * @data  : 更新数据
     */
    public function update($key,$value,$data)
    {
        if(array_key_exists('tag',$data))
        {
            //存在tag标签
            $tag_value =  $data['tag'];

            $data['tag']='';

            Article::where($key,$value)->update($data);

            //设置关联
            $array_tag_id = tags::add($tag_value);
            $model = Article::find($value);
            $model->tags()->sync($array_tag_id);

        }else{

            $data =  array_merge($data,['tag'=>'']);

            //article 插入数据
            Article::where($key,$value)->update($data);

            //同步关联
            $model = Article::find($value);

            $model->tags()->sync([]);
        }
    }

    /**
     * @description: 删除数据
     *
     * @key   : 指定条件
     * @value : 指定条件
     */
    public function delete($key,$value)
    {
        // TODO: Implement delete() method.
        return Article::where($key, $value)->delete();
    }
}