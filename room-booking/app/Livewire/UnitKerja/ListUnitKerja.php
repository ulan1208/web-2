<?php

namespace App\Livewire\UnitKerja;

use Livewire\Component;
use App\Models\UnitKerja;

class ListUnitKerja extends Component
{
    protected $listeners = ['dataUpdated' => '$refresh'];

    public function delete($id)
    {
        UnitKerja::destroy($id);
        $this->emit('dataUpdated');
    }

    public function render()
    {
        return view('livewire.unitkerja.list-unit-kerja', [
            'unitKerjas' => UnitKerja::all()
        ]);
    }
}
