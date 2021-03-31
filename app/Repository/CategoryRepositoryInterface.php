<?php


namespace App\Repository;


interface CategoryRepositoryInterface
{


    public function get();
    public function getById($id);
    public function paginate($count);
    public function createNewCategory($request);
}
