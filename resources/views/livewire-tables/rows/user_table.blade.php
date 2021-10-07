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
@if (request()->type === \App\Models\User::ENUM_TYPES_TO_LOWER_CASE[\App\Models\User::TYPE_PATIENT])
    <x-livewire-tables::table.cell>
        <a href="{{ route('patientbloodpressure.create', ['type' => $row->type]) }}">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Record Blood Pressure
            </button>
        </a>
    </x-livewire-tables::table.cell>
@endif
