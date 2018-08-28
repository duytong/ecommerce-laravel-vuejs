<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function all();

    public function paginate($perPage);

    public function store($attributes);

    public function show($id);

    public function showJson($id);

    public function update($attributes, $id);
    
    public function destroy($ids);
}
