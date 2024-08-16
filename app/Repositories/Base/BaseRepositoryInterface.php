<?php

namespace App\Repositories\Base;


interface BaseRepositoryInterface
{
    public function findAll();

    public function find(string $id);

    public function create(array $attributes);

    public function update(string $id, array $attributes);

    public function delete(string $id);

}