<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;

class ProductController extends Controller
{
    protected $product;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }
    
    public function paginate($perPage)
    {
        return $this->product->paginate($perPage);
    }

    public function store(Request $request)
    {
        return $this->product->store($request->all());
    }

    public function show($id)
    {
        return $this->product->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->product->update($request->all(), $id);
    }

    public function destroy($ids)
    {
        return $this->product->destroy($ids);
    }
}
