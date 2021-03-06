<?php

namespace App\Repositories;

interface Repositoryable
{
    public function all();

    public function paginate($perPage);

    public function store($attributes);

    public function show($id);

    public function update($attributes, $id);
    
    public function destroy($ids);
}
