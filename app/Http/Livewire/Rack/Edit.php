<?php

namespace App\Http\Livewire\Rack;

use App\Models\Rack;
use Livewire\Component;

class Edit extends Component
{
    public $isOpen, $rack;

    protected $listeners = ['edit'];
    protected $rules = [
        'rack.name' => ''
    ];

    public function render()
    {
        return view('livewire.rack.edit');
    }

    public function edit(Rack $rack)
    {
        $this->isOpen = true;
        $this->rack = $rack;
        $this->resetValidation();
    }

    public function update()
    {
        $this->validate(array_merge($this->rules, [
            'rack.name' => 'required|string|unique:racks,name,'.$this->rack->id
        ]));

        $this->rack->save();
        $this->reset('isOpen');
        $this->emit('refresh', 'Sukses mengedit rak');
    }
}
