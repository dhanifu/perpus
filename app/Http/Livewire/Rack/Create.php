<?php

namespace App\Http\Livewire\Rack;

use App\Models\Rack;

use Livewire\Component;

class Create extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|string|unique:racks'
    ];

    public function render()
    {
        return view('livewire.rack.create');
    }

    public function store(Rack $rack)
    {
        $data = $this->validate();
        $rack->create($data);

        $this->emit('refresh', 'Sukses menambah rak');
        $this->reset('name');
    }
}
