<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @php
                        $userTypes = \App\Models\User::TYPES;
                        unset($userTypes[\App\Models\User::TYPE_PATIENT]);
                        $userTypesWithoutPatient = $userTypes;
                    @endphp
                    <a href="{{ route('users.create', ['type' => $userTypesWithoutPatient]) }}">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add Staff
                        </button>
                    </a>
                    <a href="{{ route('users.create', ['type' => \App\Models\User::TYPE_PATIENT]) }}">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Add Patient
                        </button>
                    </a>
                    <br /> <br />
                    <livewire:user-table />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
