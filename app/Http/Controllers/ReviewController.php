<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ReviewRepository;

class ReviewController extends Controller
{
    protected $review;

    public function __construct(ReviewRepository $review)
    {
        $this->review = $review;
    }
    
    public function paginate($perPage)
    {
        return $this->review->paginate($perPage);
    }

    public function store(Request $request)
    {
        return $this->review->store($request->all());
    }

    public function show($id)
    {
        return $this->review->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->review->update($request->all(), $id);
    }

    public function destroy($ids)
    {
        return $this->review->destroy($ids);
    }
}
