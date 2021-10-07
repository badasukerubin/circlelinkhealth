<x-livewire-tables::table.cell>
    {{ $row->id }}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{ $row->systolic }}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{ $row->diastolic }}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{ date('F jS, Y', strtotime($row->time_of_record)) }}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{ $row->user->name }}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{ $row->created_at->diffForHumans() }}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{ $row->updated_at->diffForHumans() }}
</x-livewire-tables::table.cell>
