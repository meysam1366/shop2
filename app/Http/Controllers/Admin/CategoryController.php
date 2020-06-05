<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Helper\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryRequest;
use App\Repositories\BaseModelInterface;

class CategoryController extends Controller
{

    protected $categoryRepository;
    private $direction = "/images/category/";

    public function __construct(BaseModelInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function index()
    {
        $categories = $this->categoryRepository->all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::query()->select('title','id')->get();
        return view('admin.category.create',compact('categories'));
    }

    public function store(CategoryRequest $request)
    {
        $validated = $request->validated();
        $file = $this->uploadImage($request->file('logo'));
        $validated['logo'] = $file;
        $validated['parent_id'] = $request->parent_id;
        Category::query()->create($validated);
        session()->flash('success','successfully created');
        return redirect(route('category.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);
        $categories = $this->categoryRepository->all();
        return view('admin.category.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoryRequest $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $validated = $request->validated();
        $category = $this->categoryRepository->find($id);
        if ($request->file('logo')) {
            $file = $this->uploadImage($request->file('logo'));
            $validated['logo'] = $file;
        }else {
            $file = $category->logo;
            $validated['logo'] = $file;
        }
        $validated['status'] = $request->status ? 1 : 0;
        $validated['parent_id'] = $request->parent_id;
        $category->update($validated);
        session()->flash('success','successfully update');
        return redirect(route('category.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->categoryRepository->destroy($id);
        session()->flash('success','successfully deleted');
        return redirect(route('category.index'));
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
