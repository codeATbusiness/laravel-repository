<?php namespace Laravel_Repository\Infraestructure\Repositories;

abstract class EloquentRepository {
    protected $model;
    
    public function __construct($model)
    {
        $this->model = $model;   
    }
    
    public function getAll()
    {
        return $this->model->all();
    }
    
    public function getPaginated()
    {
        
    }
}