<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ucfirst(\App\Models\User::ENUM_TYPES_TO_LOWER_CASE[auth()->user()->type]) . '\'s Dashboard' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Successfully logged in!
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
