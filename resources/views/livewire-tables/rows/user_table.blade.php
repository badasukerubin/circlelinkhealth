<x-livewire-tables::table.cell>
    {{ $row->id }}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{ $row->name }}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{ $row->email }}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{ $row->email_verified_at->diffForHumans() }}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{ $row->created_at->diffForHumans() }}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{ $row->updated_at->diffForHumans() }}
</x-livewire-tables::table.cell>
