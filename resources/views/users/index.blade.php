<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold font-semibold text-gray-800 leading-tight">
            {{__('translation.navigation.users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="box-border w-auto p-4 border-4 border-blue-400 bg-blue-200">
                <div>
                    <ul>
                        @foreach ($users as $user)
                        <li>
                            {{$user->name}}
                            @if ($user->roles->count() > 0)
                            [
                            @foreach ($user->roles as $role)
                            {{ $role->name }}
                            @endforeach
                            ]
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>


</x-app-layout>
