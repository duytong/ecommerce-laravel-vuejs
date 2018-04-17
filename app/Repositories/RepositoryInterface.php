<?php

namespace App\Repositories;

interface RepositoryInterface
{
    /**
     * Get all of the records.
     *
     * @param  string  $columns
     */
    public function all($columns);

    /**
     * Paginate records.
     *
     * @param  int  $perPage
     */
    public function paginate($perPage);

    /**
     * Create a record.
     * 
     * @param  array  $attributes
     */
    public function create($attributes);

    /**
     * Get a record.
     * 
     * @param  int  $id
     */
    public function get($id);

    /**
     * Update a record.
     * 
     * @param  array  $attributes
     * @param  int    $id
     */
    public function update($attributes, $id);
    
    /**
     * Delete a record.
     * 
     * @param  int  $id
     */
    public function delete($id);

    /**
     * Delete multiple records.
     * 
     * @param  string  $id
     */
    public function deleteMultiple($id);
}
