<?php
namespace App\Repository;

use App\Article;


class UserRepositoryEntity implements UserRepository
{

    public function findAll()
    {
        return Article::all();
    } 
    public function delete($sid)
    {
        $student = Article::find($sid);

        return $student->delete();
    }
}
 