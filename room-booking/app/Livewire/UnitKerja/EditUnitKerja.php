<?php

namespace App\Livewire\UnitKerja;

use Livewire\Component;
use App\Models\UnitKerja;

class EditUnitKerja extends Component
{
    public $unitKerjaId, $nama_unit_kerja;

    protected $listeners = ['editUnitKerja' => 'loadData'];

    protected $rules = [
        'nama_unit_kerja' => 'required|string|max:255',
    ];

    public function loadData($id)
    {
        $unitKerja = UnitKerja::findOrFail($id);
        $this->unitKerjaId = $unitKerja->id;
        $this->nama_unit_kerja = $unitKerja->nama_unit_kerja;
    }

    public function update()
    {
        $this->validate();

        UnitKerja::find($this->unitKerjaId)->update([
            'nama_unit_kerja' => $this->nama_unit_kerja,
        ]);

        $this->reset();
        $this->emit('dataUpdated');
    }

    public function render()
    {
        return view('livewire.unitkerja.edit-unit-kerja');
    }
}
