<?php namespace Laravel_Repository\Infraestructure\Repositories;

use Laravel_Repository\Domain\Repositories\UserRepositoryInterface;

class UserRepositoryInterface extends EloquentRepository implements UserRepositoryInterface {
    public function findByEmail($email) {
        return $this->model->whereEmail($email)->first();
    }

    public function findByName($name) {
        return $this->model->whereUsername($name)->first();
    }

}