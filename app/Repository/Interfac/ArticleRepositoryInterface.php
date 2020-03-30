<?php
/**
 * Created by PhpStorm.
 * User: Time
 * Date: 2020/3/16
 * Time: 13:21
 */

namespace App\Repository\Interfac;


interface ArticleRepositoryInterface
{
     public function all($count);

     public function find($param);

     public function select($key,$value,$paginate=6);

     public function select_author_info($key,$value);

     public function create($data);

     public function update($key,$value,$data);

     public function delete($key,$value);

}