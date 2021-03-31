<?php


namespace App\Repository\Eloquent;

use App\Models\SubCategory;
use App\Repository\SubCategoryRepositoryInterface;

class SubCategoryRepository implements SubCategoryRepositoryInterface
{
    protected $categoryModel;

    public function __construct(SubCategory $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function get()
    {
        return $this->categoryModel->get();
    }

    public function getById($id)
    {
        return $this->categoryModel->findOrFail($id);
    }

    public function paginate($count)
    {
        return $this->categoryModel->paginate($count);
    }

    public function createNewCategory($request)
    {
        $category = $this->categoryModel->create([
            'title' => $request['title']
        ]);
        if ($request['parent_id']){
            $parent = $this->categoryModel->find($request['parent_id']);
            $category->appendToNode($parent)->save();
        }

        return $category;
    }
}
