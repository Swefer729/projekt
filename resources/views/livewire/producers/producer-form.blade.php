<div class="p-2">
    <form wire:submit.prevent="save">
        <h3 class="text-xl font-semibold leading-tight text-gray-800">
            @if ($editMode)
                {{__('producers.labels.edit_form_title')}}
            @else
                {{__('producers.labels.create_form_title')}}
            @endif
        </h3>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class=" pt-1.5">
                <label class="align-middle" for="name">{{__('producers.attributes.producer_name')}}</label>
            </div>
            <div class="">
                <x-input placeholder="{{__('producers.attributes.producer_name')}}" wire:model="producer.producer_name"/>
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-button href="{{ route('producers.index') }}" secondary class="mr-2 bg-gray-400" label="{{__('translation.back')}}"/>
            <x-button type="submit" primary label="{{__('translation.save')}}" class="bg-blue-400" spinner/>

        </div>
    </form>
</div>
