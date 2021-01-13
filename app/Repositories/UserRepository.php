<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository {

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function get(): Object
    {
        return $this->model->whereRole('petugas')->get();
    }

}