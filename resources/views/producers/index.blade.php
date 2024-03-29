<x-app-layout>
    <x-slot name="header">
        <div>
            <ul class="flex">
                <li class="flex-1 mr-2">
                    <a class="text-center block border border-blue-500 rounded py-2 px-4 bg-blue-500 hover:bg-blue-700 text-white"
                       href="{{ route('producers.index') }}">Producenci</a>
                </li>
                <li class="flex-1 mr-2">
                    <a class="text-center block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-2 px-4"
                       href="{{route('phonemodels.index')}}">Modele</a>
                </li>
                <li class="text-center flex-1">
                    <a class="text-center block border border-white rounded hover:border-gray-200 text-blue-500 hover:bg-gray-200 py-2 px-4"
                       href="{{route('devices.index')}}">Telefony</a>
                </li>
            </ul>
        </div>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="box-border w-auto p-4 border-4 border-400 bg-200" id="table-view-wrapper">
                <div class="grid justify-items-stretch pt-2 pr-2">

                        <x-button primary label="{{__('producers.actions.create')}}"
                                  href="{{route('producers.create')}}" class="justify-self-end bg-blue-500"/>
                </div>

                <div>
                    <livewire:producers.producers-table-view/>
                </div>
            </div>
        </div>
</x-app-layout>
