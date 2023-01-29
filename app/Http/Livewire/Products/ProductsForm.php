<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use WireUi\Traits\Actions;

class ProductsForm extends Component
{
    use Actions;


    public Product $product;
    public Bool $editMode;

    public function rules()
    {
        return [
            'product.device_id' => [
                'required',
                'exists:producers,id'
            ]
        ];

    }

    public function validationAttributes()
    {
        return [
            'producer_name' => Str::lower(__('devices.attributes.producer_name')),
            'model_name' => Str::lower(__('devices.attributes.producer_name')),
        ];
    }

    public function mount(Product $product, Bool $editMode)
    {
        $this->product = $product;
        $this->product->load('device','glass');
        $this->editMode = $editMode;
    }

    public function render()
    {
        return view('livewire.products.product-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();


        $product = $this->product;


        $product->save();


        $this->notification()->success(
            $title = $this->editMode
                ? __('translation.messages.successes.updated_title')
                : __('translation.messages.successes.stored.title'),
            $description = $this->editMode
                ? __('translation.messages.successes.updated_description')
                : __('translation.messages.successes.stored_description'),
        );
    }

}
