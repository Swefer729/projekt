<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-x1 text-gray-800 leading-tight">
            {{__('translation.navigation.products')}}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg">
                @if(isset($product))

                    <livewire:products.products-form :product="$product" :editMode="true"/>
                @else
                    <livewire:products.products-form :editMode="false"/>

                @endif

            </div>
        </div>
    </div>
</x-app-layout>
