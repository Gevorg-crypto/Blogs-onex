<?php


namespace App\Repository;


interface BlogRepositoryInterface
{

    public function get();

    public function getById($id);

    public function paginate($count, $request);

    public function createNewCategory($request);
}
