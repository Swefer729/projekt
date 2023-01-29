<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{__('translation.navigation.devices')}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                @if(isset($device))

                    <livewire:devices.devices-form :device="$device" :editMode="true"/>
                @else
                    <livewire:devices.devices-form :editMode="false"/>

                @endif

            </div>
        </div>
    </div>
</x-app-layout>
