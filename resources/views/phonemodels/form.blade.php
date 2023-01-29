<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{__('translation.navigation.phone_models')}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                @if(isset($phonemodel))

                    <livewire:phone-models.phone-models-form :phonemodel="$phonemodel" :editMode="true"/>
                @else
                    <livewire:phone-models.phone-models-form :editMode="false"/>

                @endif

            </div>
        </div>
    </div>
</x-app-layout>
