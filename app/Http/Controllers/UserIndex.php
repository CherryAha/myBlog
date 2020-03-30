<?php
/*
 * @Descripttion: 
 * @version: 
 * @Author: syt
 * @Create-Date: Do not edit
 * @Update-Date: Do not edit
 */

namespace App\Http\Controllers;

use App\ArticleTagClassify;
use App\Http\Controllers\Common\classify;
use App\Http\Controllers\Common\tags;
use App\Repository\Interfac\ArticleRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserIndex extends Controller
{
    private $ArticleRepository;
    public function __construct(ArticleRepositoryInterface $ArticleRepository )
    {
        $this->ArticleRepository = $ArticleRepository;
    }

    /**
     * @description:页面共同数据
     *
     * @auth syt
     * @time 2020/3-15
     */
    public function common_data()
    {

        $user_id = Auth::id();

        $model_author  = $this->ArticleRepository->select_author_info('author',$user_id);

        $mode_tags   = tags::select_all($user_id);

        $mode_classify = classify::all_with_id($user_id);

        return  [ "author_info"=>$model_author ,
                  "tags_list" =>$mode_tags   ,
                  "classifies_list"=>$mode_classify];
    }


    /**
     * @description:用户主页
     *
     * @auth syt
     * @time 2020/3-15
     */
    public function index()
    {
        $user_id = Auth::id();

        $model_article = $this->ArticleRepository->select('author',$user_id,5);

        $view_params = array_merge([ "article_list" =>$model_article],$this->common_data());

        return view('user_space.index.index',$view_params);
    }

    /**
     * @description:用户主页 显示标签
     *
     * @auth syt
     * @time 2020/3-15
     */
    public function tag(Request $request)
    {

        //获取请求数据
        $array_list = $request->input('list');

        $tag  = $request->input('tag');

        $model_article = $this->ArticleRepository->find($array_list);

        $param = array_merge([ "article_list" =>$model_article , "tag"=>$tag],$this->common_data());

        return view('user_space.index.index',$param);
    }

    /**
     * @description:用户主页 显示分类
     *
     * @auth syt
     * @time 2020/3-15
     */
    public function classify(Request $request)
    {
        $array_list = $request->input('list');

        $classify  = $request->input('classify');

        $model_article = $this->ArticleRepository->find($array_list);

        $view_param = array_merge(["article_list" =>$model_article,"classify"=>$classify ] , $this->common_data());

        return view('user_space.index.index',$view_param);
    }


    /**
     * @description:测试数据
     *
     * @auth syt
     * @time 2020/3-15
     */
    public function test()
    {
         //测试多对多关系
//         $article = Article::query()->where('uid',24)->with(['tags'])->first();
//
//        //dd($model[0]->name);
//        dd($article->toArray());

//         classify::all_with_id(7);

        tags::select_all(7);

//        $model_article  = Article::find(24);
//        $model_article->tags()->attach(2);
    }
}
