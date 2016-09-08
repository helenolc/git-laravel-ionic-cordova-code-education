<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests;
use CodeDelivery\Http\Requests\AdminCupomRequest;
use CodeDelivery\Repositories\CupomRepository;


class CupomsController extends Controller
{
    private $repository;

    public function __construct(CupomRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index()
    {
        $cupoms = $this->repository->paginate(5);
        return view('admin.cupoms.index',compact('cupoms'));
    }

    public function create()
    {
        return view('admin.cupoms.create');
    }

    public function store(Requests\AdminCupomRequest $request)
    {
        $data=$request->all();
        $this->repository->create($data);

        //dd($request->all());
        return redirect()->route('admin.cupoms.index');
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
