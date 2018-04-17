<?php

namespace App\Repositories;

use App\Repositories\RepositoryInterface;

abstract class BaseRepository implements RepositoryInterface
{
    public $model;

    /**
     * Instantiate a new model instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->model = app()->make($this->model());
    }

    /**
     * Specify model class name.
     */
    abstract public function model();

    /**
     * Get all of the records.
     *
     * @param  string  $columns
     * @return array
     */
    public function all($columns)
    {
        return $this->model->all(explode(',', $columns));
    }

    /**
     * Paginate records.
     * 
     * @param  int  $perPage
     * @return object
     */
    public function paginate($perPage)
    {
        return $this->model->orderBy('id', 'desc')->paginate($perPage);
    }

    /**
     * Create a record.
     * 
     * @param  array  $attributes
     * @return void
     */
    public function create($attributes)
    {
        $this->model->create($attributes);
    }

    /**
     * Get a record.
     * 
     * @param  int  $id
     * @return object
     */
    public function get($id)
    {
        return $this->model->findOrFail($id);
    }
    
    /**
     * Update a record.
     * 
     * @param  array  $attributes
     * @param  int    $id
     * @return object
     */
    public function update($attributes, $id)
    {
        return $this->model->where('id', $id)->update($attributes);
    }

    /**
     * Delete a record.
     * 
     * @param  int  $id
     * @return void
     */
    public function delete($id)
    {
        $this->get($id)->delete();
    }

    /**
     * Delete multiple records.
     * 
     * @param  string  $id
     * @return void
     */
    public function deleteMultiple($id)
    {
        $this->model->destroy(explode(',', $id));
    }
}
