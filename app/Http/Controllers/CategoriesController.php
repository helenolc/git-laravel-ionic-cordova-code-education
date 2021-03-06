<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminCategoryRequest;
use CodeDelivery\Repositories\CategoryRepository;


class CategoriesController extends Controller
{
    private $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index()
    {
        $categories = $this->repository->paginate(5);
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(AdminCategoryRequest $request)
    {
        $data=$request->all();
        $this->repository->create($data);

        //dd($request->all());
        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $category = $this->repository->find($id);
        return view ('admin.categories.edit', compact('category'));
    }

    public function update (AdminCategoryRequest $request, $id)
    {
        $data=$request->all();
        $this->repository->update($data, $id);

        //dd($request->all());
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);
        return redirect()->route('admin.categories.index');
    }
}
