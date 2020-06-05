<?php


namespace App\Repositories\CategoryRepository;


use App\Category;
use App\Repositories\BaseModelInterface;

class CategoryRepository implements BaseModelInterface
{

    public function all()
    {
        return Category::all();
    }

    public function find($id)
    {
        return Category::query()->find($id);
    }

    public function destroy($id)
    {
        try {
            return Category::query()->find($id)->delete();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
