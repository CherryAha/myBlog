<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Common\classify;
use App\Http\Requests\StoreBlogPost;
use App\Repository\Interfac\ArticleRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UeditArticle extends Controller
{
    protected $ArticleRepository;

    public function __construct(ArticleRepositoryInterface $ArticleRepository)
    {
        $this->ArticleRepository = $ArticleRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user_space.uedit.uedit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->ArticleRepository->create($request->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @description: 保存上传数据库
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function save(StoreBlogPost $request)
    {
        //判断是否是更新
        if ($request->has('article_uid')) {
            //更新
            $article = $request->except(['_token', 'article_uid']);

            $this->ArticleRepository->update("uid", $request->input('article_uid'), $article);

        } else {
            $article = $request->except(['_token']);

            $this->ArticleRepository->create($article);
        }
        return redirect(route('user.index'));
    }

    /**
     * @description: 删除条目
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->ArticleRepository->delete('uid', $id); //插入数据库

        return redirect(route('user.index'));
    }

    /**
     * @description 修改问斩
     *
     * @param  int $id
     */
    public function update(Request $request, $id)
    {
        $user_id = Auth::id();

        $article = $this->ArticleRepository->select('uid', $id);

        $classify = classify::all($user_id);

        return view('user_space.uedit.uedit', ['article' => $article[0], 'classify_list' => $classify]);
    }

    /**
     * @description 上传图片
     *
     * "=>* @param  int $id
     */
    public function update_image(Request $request)
    {
        $save_path = $request->file("file")->store("./");
        $reponse_param = array(
            "imageUrl" => url($save_path),
            "imagePath" => "/ueditor/php/",
            "imageFieldName" => "upfile",
            "imageMaxSize" => 2048,
            "imageAllowFiles" => [".png", ".jpg", ".jpeg", ".gif", ".bmp"],
            "其他配置项..." => "其他配置值..."
        );
        return response()->json(json_encode($reponse_param));
    }

    /**
     * @description 修改问斩
     *
     * @param  int $id
     */
    public function detail($id)
    {
        $article = $this->ArticleRepository->select('uid', $id, 5);
        $user_info = $this->ArticleRepository->select_author_info('uid', $id);
        $param = ["detail" => ['author' => $user_info, 'article' => $article[0]]];

        return view('user_space.article.index', $param);
    }


    public function config()
    {
        $json_array = array(

            "imageUrl" => "http://localhost/ueditor/php/controller.php?action=uploadimage",
            "imagePath" => "/ueditor/php/",
            "imageFieldName" => "upfile",
            "imageMaxSize" => 2048,
            "imageAllowFiles" => [".png", ".jpg", ".jpeg", ".gif", ".bmp"],
            "其他配置项..." => "其他配置值..."

        );
        return response(json_encode($json_array));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
