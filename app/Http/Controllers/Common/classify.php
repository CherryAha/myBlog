<?php
/**
 * Created by PhpStorm.
 * User: Time
 * Date: 2020/3/19
 * Time: 22:28
 */

namespace App\Http\Controllers\Common;


use App\Article;

class classify
{
    /**
     * @description : 获取指定用户的标签
     *
     * @param : 用户uid
     */
    public static function all($user_id){
        $model = Article::where('author',$user_id)->get(['classify']);
        $array_model = $model->toArray();
        $classify_list = array();
        if (count($array_model)){
            foreach ($array_model as $value){
                $classify = $value['classify'];
                if (!in_array($classify , $classify_list)){
                    array_push($classify_list,$classify);
                }
            }
        }
        return $classify_list;
    }

    /**
     * @DESCRIPTION : 返回查询 分类&对应的文章列表
     * @PARAM $USER_ID
     *
     * @RETURN ARRAY
     */
    public static function all_with_id($user_id){
        $model = Article::where('author',$user_id)->get(['classify','uid']);

        $array_model = $model->toArray();

        $array_list = array();
        foreach ( $array_model as $item)
        {
            $name = $item['classify'];
            $uid = $item['uid'];

            $has_classify = false;
            foreach ($array_list as $count =>$item_item)
            {

                    $item_name = $item_item["name"];
                    $item_count = $item_item["count"];
                    $item_id_list = $item_item["id_list"];

                    //对同一类 分类 增加值
                    if ($item_name == $name)
                    {
                        array_push($item_id_list,$uid);

                        $insert_array = ["name"=>$name,"count"=>($item_count+1),"id_list"=>$item_id_list];

                        //数据重新写入数组
                        $array_list[$count] = $insert_array;

                        $has_classify = true;
                    }
            }

            //如果array_list内没有
            if (!$has_classify)
            {
                  array_push($array_list , ["name"=>$name,"count"=>1,"id_list"=>[$uid]]);
            }
        }

        return $array_list;
    }


}