<?php


namespace App\Repositories\Category;


use App\Category;
use App\Helper\Helper;
use App\Repositories\BaseModelInterface;

class CategoryRepository implements BaseModelInterface
{
    private $direction = "/images/category/";

    public function model()
    {
        return Category::query();
    }

    public function all()
    {
        return $this->model()->with('parent')->get();
    }

    public function create()
    {
        return $this->model()->select('title','id')->get();
    }

    public function store($columns,$request)
    {
        $file = $this->uploadImage($request->file('logo'));
        $columns['logo'] = $file;
        $columns['parent_id'] = $request->parent_id;
        session()->flash('success','successfully created');
        return $this->model()->create($columns);
    }

    public function update($columns,$request,$id)
    {
        $category = $this->model()->find($id);
        if ($request->file('logo')) {
            $file = $this->uploadImage($request->file('logo'));
        }else {
            $file = $category->logo;
        }
        $validated['logo'] = $file;
        $validated['status'] = $request->status ? 1 : 0;
        $validated['menu_show'] = $request->menu_show ? 1 : 0;
        $validated['parent_id'] = $request->parent_id;
        session()->flash('success','successfully update');
        return $category->update($validated);
    }

    public function find($id)
    {
        return $this->model()->find($id);
    }

    public function destroy($id)
    {
        try {
            session()->flash('success','successfully deleted');
            return $this->model()->find($id)->delete();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $logo
     * @return string
     */
    private function uploadImage($logo)
    {
        return $this->direction.Helper::uploadFile($this->direction,$logo);
    }
}
