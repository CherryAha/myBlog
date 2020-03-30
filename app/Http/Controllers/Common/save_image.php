<?php
/**
 * Created by PhpStorm.
 * User: Time
 * Date: 2020/3/18
 * Time: 15:42
 */

namespace App\Http\Controllers\Common;


use Illuminate\Http\Request;

class save_image
{
    /**
     * @description:上传图片
     * @param Request $request
     */
    public static function up(Request $request){
      $path = $request->file("uedit_upload")->store("uedit");
      return $path;
    }
}