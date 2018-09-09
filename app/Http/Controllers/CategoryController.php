<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    protected $categories;

    public function __construct(CategoryRepository $categories)
    {
        $this->categories = $categories;
    }
    
    public function index(CategoryRequest $request)
    {
        return $this->categories->index($request->perPage);
    }

    public function store(CategoryRequest $request)
    {
        return $this->categories->store($request->all());
    }

    public function show($id)
    {
        return $this->categories->show($id);
    }

    public function update(CategoryRequest $request, $id)
    {
        return $this->categories->update($request->all(), $id);
    }

    public function destroy($ids)
    {
        return $this->categories->destroy($ids);
    }
}
