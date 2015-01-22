<?php namespace Laravel_Repository\Domain\Repositories;

interface UserRepositoryInterface {
    public function findByName($name);
    public function findByEmail($email);
}