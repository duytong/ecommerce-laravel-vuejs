<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BrandRepository;

class BrandController extends Controller
{
    protected $brand;

    public function __construct(BrandRepository $brand)
    {
        $this->brand = $brand;
    }
    
    public function paginate($perPage)
    {
        return $this->brand->paginate($perPage);
    }

    public function store(Request $request)
    {
        return $this->brand->store($request->all());
    }

    public function show($id)
    {
        return $this->brand->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->brand->update($request->all(), $id);
    }

    public function destroy($ids)
    {
        return $this->brand->destroy($ids);
    }
}
