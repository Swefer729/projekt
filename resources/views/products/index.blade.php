<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-semibold text-gray-800 leading-tight">
            {{__('translation.navigation.products') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="box-border w-auto p-4 border-4 border-400 bg-200" id="table-view-wrapper">

                <div class="grid justify-items-stretch pt-2 pr-2">
                    <x-button primary label="{{__('products.actions.create')}}" href="{{route('products.create')}}"
                              class="justify-self-end bg-blue-500"/>
                </div>

                <div>
                    <livewire:products.products-table-view/>
                </div>
            </div>
        </div>
</x-app-layout>
