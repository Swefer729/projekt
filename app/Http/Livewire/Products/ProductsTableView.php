<?php

namespace App\Http\Livewire\Products;

use App\Models\Product;
use LaravelViews\Facades\Header;
use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Views\TableView;

class ProductsTableView extends TableView
{

    protected $model = Product::class;

    public function repository(): Builder
    {
        return Product::query();
    }

    public function headers(): array
    {
        return [
            Header::title(__('products.attributes.phone_model')),
            Header::title(__('products.attributes.product_name')),
            Header::title(__('products.attributes.weight')),
            Header::title(__('products.attributes.height')),
            Header::title(__('products.attributes.width')),

        ];
    }

    public function row($model): array
    {
        return [
            implode(' ', [$model->device->producer->producer_name, $model->device->phonemodel->model_name]),
            $model->glass->product_name  ,
            $model->weight."g",
            $model->height." mm",
            $model->width." mm",

        ];
    }
}
