<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use WireUi\Traits\Actions;

class ProductsForm extends Component
{
    use Actions;
    use AuthorizesRequests;


    public Product $product;
    public Bool $editMode;

    public function rules()
    {
        return [
            'product.device_id' => [
                'required',
                'exists:producers,id'
            ],
            'product.glass_id' => [
                'required',
                'exists:glasses,id'
            ],
            'product.weight' => [
                'required',
                'numeric'
            ],
            'product.height' => [
                'required',
                'numeric'
            ],
            'product.width' => [
                'required',
                'numeric'
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

        if($this->editMode){
            $this->authorize('update', $this->product);
        } else {
            $this->authorize('create',Product::class);
        }

       $this->validate();
        $this->product->save();
        $this->notification()->success(
            $title = $this->editMode
                ? __('products.messages.successes.updated_title')
                : __('products.messages.successes.stored_title'),
            $description = $this->editMode
                ? __('products.messages.successes.updated_description')
                : __('products.messages.successes.stored_description'),
        );
    }

}
