<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-semibold text-gray-800 leading-tight">
            {{__('translation.navigation.users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="box-border w-auto p-4 border-4 border-400 bg-200" id="table-view-wrapper">
                <div>
                    <livewire:users.users-table-view/>
                </div>
            </div>
        </div>


</x-app-layout>
