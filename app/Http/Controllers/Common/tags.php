<?php
/**
 * Created by PhpStorm.
 * User: Time
 * Date: 2020/3/19
 * Time: 15:15
 */

namespace App\Http\Controllers\Common;

use App\Article;
use App\Tag;
use Illuminate\Support\Facades\DB;

class tags
{
    /**
     * @descption: 新增
     *
     * @param  : tag数组
     * @return : tag_id 数组
     */
    public static function add(array $tags)
    {
        $tags_id = array();
        foreach ($tags as $value)
        {
            if($value){
                $id = DB::table('tags')->insertGetid(['name'=>$value]);
                array_push($tags_id,$id);
            }
        }
        return $tags_id;
    }


    /**
     * @descption: 返回tag id
     *
     * @param  : tag名字
     * @return : integer
     */
    public function select($tag)
    {
        return Tag::where('name',$tag)->first();
    }


    /**
     * @descption: 获取用户名 所有 tag
     *
     * @param  : $user_id
     * @return : integer
     */
    public static function select_all($user_id)
    {

        $article = Article::query()->where('author',$user_id)->with(['tags'])->get();
        $article = $article->toArray();

        //循环文章列表
        $array_tags_list = array();
        foreach ($article as $item)
        {
            $article_id = $item['uid'];
            $array_tags = $item['tags'];

            //循环tag数组
            foreach ($array_tags as $tags_item)
            {
                $tag_name = $tags_item['name'];

                $tag_exist = false;

                //循环存储tag数组
                foreach ($array_tags_list as $count =>$tags_list_item)
                {
//                    dd($tags_list_item['list']);
                    $tags_list_name = $tags_list_item['name'];

                    $tags_list_count = $tags_list_item['count'];

                    $tags_list_id_list = $tags_list_item['list'];

                    if ($tags_list_name == $tag_name)
                    {
                        array_push($tags_list_id_list,$article_id);

                        $insert_array = ["name"=>$tags_list_name,"count"=>($tags_list_count+1),"list"=>$tags_list_id_list];

                        $array_tags_list[$count] = $insert_array;
                    }
                }

                //如果 储存tag数组 不存在则增加
                if (!$tag_exist){
                    array_push($array_tags_list , ["name"=>$tag_name,"count"=>1,"list"=>[$article_id]]);
                }
            }
        }

        return $array_tags_list;
    }

}