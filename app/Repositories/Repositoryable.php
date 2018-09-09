<?php

namespace App\Repositories;

interface Repositoryable
{
    public function index($perPage);

    public function store($attributes);

    public function show($id);

    public function update($attributes, $id);
    
    public function destroy($ids);
}
