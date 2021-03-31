<?php


namespace App\Repository\Eloquent;


use App\Models\Blog;
use App\Models\Category;
use App\Repository\BlogRepositoryInterface;

class BlogRepository implements BlogRepositoryInterface
{
    protected $blogModel;

    public function __construct(Blog $blogModel)
    {
        $this->blogModel = $blogModel;
    }

    public function get()
    {
        return $this->blogModel->get();
    }

    public function getById($id)
    {
        return $this->blogModel->findOrFail($id);
    }

    public function paginate($count, $request)
    {
        $request['category'] = 1;

        $request['subcategory'] = 1;
        $ids = Category::find($request['category'])->child->pluck('id');
        $ids[] = $request['category'];
        $query = $this->blogModel->where(function ($query) use ($ids){
            $query->when($ids,function ($query)use ($ids){
                $query->leftJoin('id',$ids);
            });
            return $query;
        });
        return $query->paginate($count);
    }

    public function createNewCategory($request)
    {
        if ($request['file']) {
            $imagePath = $this->blogModel->uploadFile($request['file']);
        }
        $blog = $this->blogModel->create([
            'user_id' => auth()->id(),
            'name' => $request['name'],
            'description' => $request['description'],
            'picture_url' => $imagePath ?? 'unset',
        ]);
        $blog->categories()->attach($request['category']);
        return $blog;
    }

}
