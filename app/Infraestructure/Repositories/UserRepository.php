<?php namespace Laravel_Repository\Infraestructure\Repositories;

use Laravel_Repository\Infraestructure\Repositories\EloquentRepository;
use Laravel_Repository\Domain\Repositories\UserRepositoryInterface;

class UserRepository extends EloquentRepository implements UserRepositoryInterface {
    public function __construct(\Laravel_Repository\User $model)
    {
        parent::__construct($model);
    }
    
    public function findByEmail($email) {
        return $this->model->whereEmail($email)->first();
    }

    public function findByName($name) {
        return $this->model->whereName($name)->first();
    }

}