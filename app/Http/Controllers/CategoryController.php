<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }
    
    public function paginate($perPage)
    {
        return $this->category->paginate($perPage);
    }

    public function store(Request $request)
    {
        return $this->category->store($request->all());
    }

    public function show($id)
    {
        return $this->category->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->category->update($request->all(), $id);
    }

    public function destroy($ids)
    {
        return $this->category->destroy($ids);
    }
}
