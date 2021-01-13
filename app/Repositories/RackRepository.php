<?php

namespace App\Repositories;

use App\Models\Rack;

class RackRepository {

    protected $rack;

    public function __construct(Rack $rack)
    {
        $this->rack = $rack;
    }

    public function search(string $name = null): Object
    {
        return $this->rack->where('name', 'like', "%{$name}%")->get(['id', 'name as text']);
    }

}