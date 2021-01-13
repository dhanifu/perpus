<?php

namespace App\Http\Livewire\Rack;

use App\Models\Rack;

use Livewire\Component;
use Livewire\WithPagination;

class Data extends Component
{
    use WithPagination;

    protected $listeners = ['refresh', 'delete'];
	protected $paginationTheme = 'bootstrap';

    public function render(Rack $rack)
    {
        $racks = $rack->paginate(5);
        return view('livewire.rack.data', compact('racks'));
    }

    public function refresh(string $message)
    {
        session()->flash('success', $message);
    }

    public function delete(Rack $rack)
    {
        $rack->delete();
        $this->refresh("Sukses menghapus data");
    }
}
