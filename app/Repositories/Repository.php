<?php

namespace App\Repositories;

use App\Repositories\Repositoryable;

abstract class Repository implements Repositoryable
{
    public $model;

    abstract public function model();

    public function __construct()
    {
        $this->model = app($this->model());
    }

    public function index($attributes)
    {
        if ($attributes) {
            return $this->model->paginate($attributes);
        }

        return $this->model->all();
    }

    public function store($attributes)
    {
        return $this->model->create($attributes);
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }
    
    public function update($attributes, $id)
    {
        return $this->model->where('id', $id)->update($attributes);
    }

    public function destroy($ids)
    {
        return $this->model->destroy(explode(',', $ids));
    }

    public function showJson($id)
    {
        $data = $this->model->findOrFail($id);

        return response()->json([
            'data' => $data,
            'created_at' => $data->created_at->diffForHumans(),
            'updated_at' => $data->updated_at->diffForHumans()
        ]);
    }
}
