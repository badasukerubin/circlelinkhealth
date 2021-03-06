<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 w-1/2 mx-auto">
                    <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                        Record Blood Pressure
                    </h2>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST"
                        action="{{ route('patientbloodpressure.store', ['id' => request()->id]) }}">
                        @csrf

                        <!-- Systolic -->
                        <div>
                            <x-label for="systolic" :value="__('Systolic')" />

                            <x-input id="systolic" class="block mt-1 w-full" type="number" name="systolic"
                                :value="old('systolic')" required autofocus />
                        </div>

                        <!-- Systolic -->
                        <div>
                            <x-label for="diastolic" :value="__('Diastolic')" />

                            <x-input id="diastolic" class="block mt-1 w-full" type="number" name="diastolic"
                                :value="old('diastolic')" required autofocus />
                        </div>

                        <div x-data
                            x-init="flatpickr($refs.datetimewidget, {wrap: true, enableTime: true, dateFormat: 'Y-m-d H:i'});"
                            x-ref="datetimewidget" class="flatpickr container mx-auto col-span-6 sm:col-span-6 mt-5">
                            <label for="datetime" class="flex-grow  block font-medium text-sm text-gray-700 mb-1">Date
                                and Time</label>
                            <div class="flex align-middle align-content-center">
                                <input x-ref="datetime" type="text" id="time_of_record" name="time_of_record" data-input
                                    placeholder="Select.."
                                    class="block w-full px-2 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-l-md shadow-sm">

                                <a class="h-11 w-10 input-button cursor-pointer rounded-r-md bg-transparent border-gray-300 border-t border-b border-r"
                                    title="clear" data-clear>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 mt-2 ml-1"
                                        viewBox="0 0 20 20" fill="#c53030">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>

                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Record') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
