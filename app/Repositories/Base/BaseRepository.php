<?php

namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Model;


class BaseRepository implements BaseRepositoryInterface {

    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function findAll(){
        return $this->model->all();
    }

    public function create(array $attributes) {
        return $this->model->create($attributes);
    }

    public function update(string $id, array $attributes) {
        $instance = $this->model->findOrFail($id);
        $instance->update($attributes);
        return $instance;
    }

    public function find($id) {
        $instance = $this->model->findOrFail($id);
        return $instance ;
    }

    public function delete($id) {
        return $this->model->find($id)->delete();
    }

}