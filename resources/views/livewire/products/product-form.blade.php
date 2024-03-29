<div class="p-2">
    <form wire:submit.prevent="save">
        <h3 class="text-xl font-semibold leading-tight text-gray-800">
            @if ($editMode)
                {{__('products.labels.edit_form_title')}}
            @else
                {{__('products.labels.create_form_title')}}
            @endif
        </h3>
        <hr class="my-2">
        <div class="grid grid-cols-2 gap-2">
            <div class=" pt-1.5">
                <label class="align-middle" for="name">{{__('products.attributes.phone_model')}}</label>
            </div>
            <div class="">
                <x-select placeholder="{{__('translation.select')}}" wire:model.defer="product.device_id"
                          :async-data="route('async.devices')" option-label="device_name" option-value="id"/>

            </div>
        </div>
        <div class="grid grid-cols-2 gap-2 pt-2">
            <div class=" pt-1.5">
                <label class="align-middle" for="name">{{__('glasses.attributes.product_name')}}</label>
            </div>
            <div class="">
                <x-select placeholder="{{__('translation.select')}}" wire:model.defer="product.glass_id"
                          :async-data="route('async.glasses')" option-label="product_name" option-value="id"/>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-2 pt-2">
            <div class=" pt-1.5">
                <label class="align-middle" for="name">{{__('products.attributes.weight')}}</label>
            </div>
            <div class="">
                <x-input placeholder="{{__('products.attributes.weight')}}"
                         wire:model="product.weight"/>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2 pt-2">
            <div class=" pt-1.5">
                <label class="align-middle" for="name">{{__('products.attributes.height')}}</label>
            </div>
            <div class="">
                <x-input placeholder="{{__('products.attributes.height')}}"
                         wire:model="product.height"/>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-2 pt-2">
            <div class=" pt-1.5">
                <label class="align-middle" for="name">{{__('products.attributes.width')}}</label>
            </div>
            <div class="">
                <x-input placeholder="{{__('products.attributes.width')}}"
                         wire:model="product.width"/>
            </div>
        </div>
        <hr class="my-2">
        <div class="flex justify-end pt-2">
            <x-button href="{{ route('products.index') }}" secondary class="mr-2 bg-gray-400"
                      label="{{__('translation.back')}}"/>
            <x-button type="submit" primary label="{{__('translation.save')}}" class="bg-blue-400" spinner/>

        </div>
    </form>
</div>
