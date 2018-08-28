<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\OrderRepository;

class OrderController extends Controller
{
    protected $order;

    public function __construct(OrderRepository $order)
    {
        $this->order = $order;
    }
    
    public function paginate($perPage)
    {
        return $this->order->paginate($perPage);
    }

    public function store(Request $request)
    {
        return $this->order->store($request->all());
    }

    public function show($id)
    {
        return $this->order->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->order->update($request->all(), $id);
    }

    public function destroy($ids)
    {
        return $this->order->destroy($ids);
    }
}
