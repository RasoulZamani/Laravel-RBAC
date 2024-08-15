<?php

namespace App\Repository\Base;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
// use App\Repository\Base\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface {

    protected $model;

    public function __construct(Model $model) {
        $this->model = $model;
    }

    public function findAll(){
        return $this->model->all();
    }

    public function create(array $data) {
        return $this->model->create($data);
    }

    public function update(string $id, array $data) {
        $instance = $this->model->findOrFail($id);
        $instance->update($data);
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