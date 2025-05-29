<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Ruang {{ $ruang->kode }}</h1>
    @if ($unitKerjaId)
        <form wire:submit.prevent="update">
            <input type="text" wire:model="nama_unit_kerja" placeholder="Nama Unit Kerja">
            <button type="submit">Update</button>
        </form>
    @endif
</div>
