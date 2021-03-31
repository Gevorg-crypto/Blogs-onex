<?php


namespace App\Repository\Eloquent;


use App\Models\Category;
use App\Repository\CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $categoryModel;

    public function __construct(Category $categoryModel)
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
        if ($request['parent_category']) {
            $this->categoryModel->find($request['parent_category'])->child()->attach($category);
        }
        if (isset($request['sub_category'])) {
            $category->child()->attach($request['sub_category']);
        }
        return $category;
    }

}
