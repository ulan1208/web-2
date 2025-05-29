<?php

namespace App\Livewire\UnitKerja;

use Livewire\Component;
use App\Models\UnitKerja;

class CreateUnitKerja extends Component
{
    public $nama_unit_kerja;

    protected $rules = [
        'nama_unit_kerja' => 'required|string|max:255',
    ];

    public function store()
    {
        $this->validate();

        UnitKerja::create([
            'nama_unit_kerja' => $this->nama_unit_kerja,
        ]);

        $this->reset();
        $this->emit('dataUpdated');
    }

    public function render()
    {
        return view('livewire.unitkerja.create-unit-kerja');
    }
}
